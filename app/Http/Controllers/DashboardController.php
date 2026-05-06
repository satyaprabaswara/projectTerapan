<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahDokumen = Document::count();
        $jumlahKategori = Category::count();

        return view('dashboard', compact(
            'jumlahDokumen',
            'jumlahKategori'
        ));
    }
}