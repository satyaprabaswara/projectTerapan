<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDocuments = Document::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();

        $todayDocuments = Document::whereDate(
            'created_at',
            today()
        )->count();

        $documents = Document::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalDocuments',
            'totalCategories',
            'totalUsers',
            'todayDocuments',
            'documents'
        ));
    }
}