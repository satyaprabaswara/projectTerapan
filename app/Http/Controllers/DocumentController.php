<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $documents = Document::with('category')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_dokumen', 'like', "%{$search}%");
            })
            ->get();

        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('documents.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required',
            'tanggal_upload' => 'required',
            'category_id' => 'required',
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();

        $file->storeAs('documents', $filename, 'public');

        Document::create([
            'nama_dokumen' => $request->nama_dokumen,
            'deskripsi' => $request->deskripsi,
            'tanggal_upload' => $request->tanggal_upload,
            'category_id' => $request->category_id,
            'file' => $filename
        ]);

        return redirect()->route('documents.index');
    }

    public function destroy(Document $document)
    {
        Storage::delete('public/documents/' . $document->file);

        $document->delete();

        return redirect()->route('documents.index');
    }

    public function download(Document $document)
    {
        return Storage::download('public/documents/' . $document->file);
    }
}