<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalDocuments = Document::count();

        $totalCategories = Category::count();

        $totalUsers = User::count();

        $todayDocuments = Document::whereDate(
            'created_at',
            today()
        )->count();

        // Query dokumen
        $query = Document::with('category');

        // Filter kategori
        if ($request->filled('category_id')) {
            $query->where(
                'category_id',
                $request->category_id
            );
        }

        // Search dokumen
        if ($request->filled('search')) {
            $query->where(
                'nama_dokumen',
                'like',
                '%' . $request->search . '%'
            );
        }

        $documents = $query
            ->latest()
            ->take(10)
            ->get();

        $categories = Category::with('documents')->get();

        return view(
            'dashboard',
            compact(
                'totalDocuments',
                'totalCategories',
                'totalUsers',
                'todayDocuments',
                'documents',
                'categories'
            )
        );
    }
}