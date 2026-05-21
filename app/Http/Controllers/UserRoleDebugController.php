<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoleDebugController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();

        return response()->json([
            'authenticated' => Auth::check(),
            'user_id' => $user?->id,
            'role' => $user?->role,
            'email' => $user?->email,
            'name' => $user?->name,
        ]);
    }
}

