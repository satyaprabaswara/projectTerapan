<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    // halaman daftar dokumen
    public function index(Request $request)
    {
        $query = Document::with('category');

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
            'tanggal_upload' => 'required',
            'category_id' => 'required',
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048'
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
        Document::create([
            'nama_dokumen' => $request->nama_dokumen,
            'tanggal_upload' => $request->tanggal_upload,
            'category_id' => $request->category_id,
            'file' => 'documents/' . $filename
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
        Storage::disk('public')
            ->delete($document->file);

        $document->delete();

        return redirect()
            ->route('document.index');
    }

    // download dokumen
    public function download(Document $document)
    {
        return Storage::disk('public')
            ->download($document->file);
    }
}