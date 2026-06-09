<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    // halaman daftar dokumen
    public function index(Request $request)

    {
        $query = Document::with(['category', 'user']);

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

        $documents = $query
            ->latest()
            ->get();


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
            'file' => 'documents/' . $filename,
            'file_size' => $file->getSize(), // bytes
            'deskripsi' => $request->deskripsi,
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
        return Storage::disk('public')
            ->download($document->file);
    }

    public function show($id)
    {
        $document = Document::with('category')->findOrFail($id);

        return view(
            'document.show',
            compact('document')
        );
    }

    public function view(Document $document)
    {
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