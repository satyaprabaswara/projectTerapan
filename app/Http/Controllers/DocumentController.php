<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use App\Models\ActivityLog;
use App\Models\DocumentShare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class DocumentController extends Controller
{
    private function currentUserId(): ?int
    {
        return Auth::id();
    }

    private function currentIsAdmin(): bool
    {
        $user = Auth::user();
        return $user && is_string($user->role) && strtolower($user->role) === 'admin';
    }

    // halaman daftar dokumen
    public function index(Request $request)
    {
        $userId = $this->currentUserId();
        $isAdmin = $this->currentIsAdmin();

        $query = Document::with(['category', 'user']);

        // kontrol akses "seperti gdrive"
        if (!$isAdmin) {
            $query->where(function ($q) use ($userId) {
                $q->where('visibility', 'public')
                  ->orWhere('user_id', $userId)
                  ->orWhere(function ($sub) use ($userId) {
                      $sub->where('visibility', 'shared')
                          ->whereHas('sharedUsers', function ($u) use ($userId) {
                              $u->where('users.id', $userId);
                          });
                  });
            });
        }


        // filter kategori
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        // search
        if ($request->search) {
            $query->where(
                'nama_dokumen',
                'like',
                '%' . $request->search . '%'
            );
        }

        $sort = $request->input('sort', 'tanggal');
        $order = $request->input('order', 'desc') === 'asc' ? 'asc' : 'desc';

        // sort: nama (abjad) atau tanggal (tanggal upload / updated_at)
        if ($sort === 'nama') {
            $documents = $query
                ->orderBy('nama_dokumen', $order)
                ->get();
        } else {
            // default tanggal
            $documents = $query
                ->orderBy('updated_at', $order)
                ->get();
        }



        $categories = Category::all();

        return view(
            'document.index',
            compact(
                'documents',
                'categories'
            )
        );
    }

    // upload dokumen
    public function store(Request $request)

    {
        $request->validate([
            'nama_dokumen' => 'required',
            'category_id' => 'required',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg|max:10240'
        ], [
            'file.mimes' => 'File hanya boleh PDF, Word, Excel, atau PNG/JPG',
            'file.max' => 'Ukuran file maksimal 10MB'
        ]);


        // upload file
        $file = $request->file('file');

        $filename =
            time() . '_' .
            $file->getClientOriginalName();

        $file->storeAs(
            'documents',
            $filename,
            'public'
        );

        // simpan ke database
        $document = Document::create([
            'nama_dokumen' => $request->nama_dokumen,
            'deskripsi' => $request->deskripsi,
            'tanggal_upload' => now()->toDateString(),
            'category_id' => $request->category_id,
            'user_id' => $request->user()->id,
            'visibility' => 'private',
            'file' => 'documents/' . $filename,
            'file_size' => $file->getSize(), // bytes
        ]);



        // log aktivitas
        ActivityLog::create([
            'user_id' => $request->user()->id,
            'action' => 'document.created',
            'description' => sprintf(
                'Jam %s user %s mengupload dokumen "%s"',
                now()->format('H:i'),
                $request->user()->name ?? $request->user()->email ?? $request->user()->id,
                $document->nama_dokumen
            ),
            'subject_type' => Document::class,
            'subject_id' => $document->id,
        ]);

        return redirect()
            ->route('document.index')
            ->with(
                'success',
                'Dokumen berhasil diupload'
            );
    }

    // hapus dokumen
    public function destroy(Document $document)
    {
        $documentName = $document->nama_dokumen;

        // soft delete saja
        $document->delete();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'document.deleted',
            'description' => sprintf(
                'Jam %s user %s menghapus dokumen "%s"',
                now()->format('H:i'),
                auth()->user()->name ?? auth()->user()->email ?? auth()->id(),
                $documentName
            ),
            'subject_type' => Document::class,
            'subject_id' => $document->id,
        ]);

        return redirect()
            ->route('document.index');
    }


    // download dokumen
    public function download(Document $document)
    {
        $document->load(['sharedUsers']);

        if (!$this->currentIsAdmin()) {
            $userId = $this->currentUserId();

            $allowed = $document->visibility === 'public'
                || $document->user_id === $userId
                || ($document->visibility === 'shared' && $document->sharedUsers->contains('id', $userId));

            abort_unless($allowed, 403);
        }

        return Storage::disk('public')
            ->download($document->file);
    }


    public function show($id)
    {
        $document = Document::with(['category', 'user', 'sharedUsers'])->findOrFail($id);

        if (!$this->currentIsAdmin()) {
            $userId = $this->currentUserId();

            $allowed = $document->visibility === 'public'
                || $document->user_id === $userId
                || ($document->visibility === 'shared' && $document->sharedUsers->contains('id', $userId));

            abort_unless($allowed, 403);
        }

        return view('document.show', compact('document'));
    }


    public function view(Document $document)
    {
        // Pastikan relasi untuk cek permission
        $document->load(['sharedUsers']);

        if (!$this->currentIsAdmin()) {
            $userId = $this->currentUserId();

            $allowed = $document->visibility === 'public'
                || $document->user_id === $userId
                || ($document->visibility === 'shared' && $document->sharedUsers->contains('id', $userId));

            abort_unless($allowed, 403);
        }

        $filePath = storage_path('app/public/' . $document->file);

        return response()->file($filePath);
    }


    public function trash()
    {
        $documents = Document::onlyTrashed()
            ->latest()
            ->get();

        return view(
            'document.trash',
            compact('documents')
        );
    }

    public function restore($id)
    {
        $document = Document::onlyTrashed()->findOrFail($id);

        $document->restore();

        return redirect()
            ->route('document.trash')
            ->with('success', 'Dokumen berhasil direstore');
    }

    public function forceDelete($id)
    {
        $document = Document::onlyTrashed()->findOrFail($id);

        Storage::disk('public')
            ->delete($document->file);

        $document->forceDelete();

        return redirect()
            ->route('document.trash')
            ->with('success', 'Dokumen dihapus permanen');
    }
}