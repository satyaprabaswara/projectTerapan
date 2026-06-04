<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
    ->middleware(['auth']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('document', DocumentController::class);

Route::get('/activity-logs', [\App\Http\Controllers\ActivityLogController::class, 'index'])
    ->middleware('auth')
    ->name('activity.logs');


Route::resource(
    'categories',
    CategoryController::class
);

Route::get(
    '/document/{id}',
    [DocumentController::class, 'show']
)->name('document.show');

Route::get(
    '/document/view/{document}',
    [DocumentController::class, 'view']
)->name('document.view');

Route::get(
    '/document/download/{document}',
    [DocumentController::class, 'download']
)->name('document.download');

Route::resource('users', \App\Http\Controllers\UserController::class);

Route::get('/debug/user-role', [\App\Http\Controllers\UserRoleDebugController::class, 'show'])
    ->middleware('auth')
    ->name('debug.user-role');

require __DIR__.'/auth.php';