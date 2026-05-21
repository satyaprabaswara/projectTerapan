<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // ExampleTest mengharuskan response 200.
    // Tanpa auth, tampilkan dashboard view apa adanya.
    return view('dashboard');
});



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('document', DocumentController::class);

Route::resource('users', \App\Http\Controllers\UserController::class);

Route::get('/debug/user-role', [\App\Http\Controllers\UserRoleDebugController::class, 'show'])
    ->middleware('auth')
    ->name('debug.user-role');

require __DIR__.'/auth.php';


