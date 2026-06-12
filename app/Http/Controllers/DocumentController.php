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

        if (!$user) {
            return false;
        }

        $role = $user->role;

        // robust: handle null/non-string, dan hilangkan whitespace
        return trim(strtolower((string) $role)) === 'admin';
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

    // Share akses dokumen (owner/admin)
    public function sharesListJson(Document $document)
    {
        $document->load('sharedUsers');

        if (!$this->currentIsAdmin()) {
            $userId = $this->currentUserId();
            $allowed = $document->visibility === 'public'
                || $document->user_id === $userId
                || ($document->visibility === 'shared' && $document->sharedUsers->contains('id', $userId));

            abort_unless($allowed, 403);
        }

        $canManage = $this->currentIsAdmin() || (int) $document->user_id === (int) $this->currentUserId();

        return response()->json([
            'canManage' => $canManage,
            'users' => $document->sharedUsers->map(fn ($u) => [
                'id' => $u->id,
                'name' => $u->name,
                'email' => $u->email,
                'permission' => $u->pivot->permission,
                'removeUrl' => $canManage
                    ? route(
                        'document.shares.destroy',
                        [
                            'document' => $document->id,
                            'user' => $u->id
                        ]
                    )
                    : null,
            ])->values(),
        ]);
    }


    public function shareStore(Request $request, Document $document)
    {
        $user = $request->input('email');

        $targetUser = \App\Models\User::where(
            'email',
            $user
        )->first();
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'permission' => 'required|in:viewer,editor'
        ]);

        $user = $request->input('email');
        $targetUser = \App\Models\User::where('email', $user)->first();

        abort_unless($targetUser, 404);

        // owner/admin policy
        $isOwner = (int) $document->user_id === (int) $this->currentUserId();
        abort_unless($this->currentIsAdmin() || $isOwner, 403);

        // idempotent: unique(document_id,user_id) di DB
        $created = false;

        $document->load('sharedUsers');

        if ($document->sharedUsers->contains('id', $targetUser->id)) {
            // already shared
            $created = false;
        } else {
            // kalau dokumen private, saat share pertama kali set jadi shared
            if ($document->visibility === 'private') {
                $document->visibility = 'shared';
                $document->save();
            }

            $document->sharedUsers()
            ->syncWithoutDetaching([
                $targetUser->id => [
                    'permission' => $request->permission
                ]
            ]);
            $created = true;
        }

        return back()->with(
            'success',
            $created ? 'Akses berhasil ditambahkan' : 'User tersebut sudah memiliki akses'
        );
    }

    public function shareDestroy(Document $document, \App\Models\User $user)
    {
        // policy owner/admin
        $isOwner = (int) $document->user_id === (int) $this->currentUserId();
        abort_unless($this->currentIsAdmin() || $isOwner, 403);

        $document->load('sharedUsers');

        // hapus relasi
        $document->sharedUsers()->detach($user->id);

        // jika tidak ada shared users tersisa dan visibility shared, kembali private
        $document->refresh();
        $remaining = $document->sharedUsers()->count();

        if ($document->visibility === 'shared' && $remaining === 0) {
            $document->visibility = 'private';
            $document->save();
        }

        return back()->with('success', 'Akses berhasil dihapus');
    }

    // Update (digunakan untuk fitur "Ganti Nama")
    public function update(Request $request, Document $document)
    {
        $isOwner = (int) $document->user_id === (int) $this->currentUserId();
        abort_unless($this->currentIsAdmin() || $isOwner, 403);

        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
        ]);

        $oldName = $document->nama_dokumen;

        $document->update([
            'nama_dokumen' => $request->input('nama_dokumen'),
        ]);

        ActivityLog::create([
            'user_id' => $this->currentUserId(),
            'action' => 'document.renamed',
            'description' => sprintf(
                'Jam %s user %s mengganti nama dokumen dari "%s" menjadi "%s"',
                now()->format('H:i'),
                Auth::user()->name ?? Auth::user()->email ?? Auth::user()->id,
                $oldName,
                $document->nama_dokumen
            ),
            'subject_type' => Document::class,
            'subject_id' => $document->id,
        ]);

        return redirect()->route('document.index')
            ->with('success', 'Nama dokumen berhasil diperbarui');
    }
}

