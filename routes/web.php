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

    // HALAMAN PROFILE
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');

    // HALAMAN EDIT PROFILE
    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    // UPDATE PROFILE
    Route::patch('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    // DELETE PROFILE
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::resource('document', DocumentController::class);

Route::get('/activity-logs', [\App\Http\Controllers\ActivityLogController::class, 'index'])
    ->middleware('auth')
    ->name('activity.logs');


Route::resource(
    'categories',
    CategoryController::class
);

// NOTE: Route resource('document', ...) sudah menyediakan DocumentController@show untuk '/document/{document}'
// sehingga definisi tambahan '/document/{id}' dihapus agar tidak terjadi konflik route name.



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

Route::get('/profile', function () {
    return view('profile.index');
})->name('profile');

Route::get('/settings', function () {
    return view('settings.index');
})->name('settings');

Route::get(
    '/documents/trash',
    [DocumentController::class, 'trash']
)->name('document.trash');

Route::put(
    '/documents/{id}/restore',
    [DocumentController::class, 'restore']
)->name('document.restore');

Route::delete(
    '/documents/{id}/force-delete',
    [DocumentController::class, 'forceDelete']
)->name('document.forceDelete');

// Kelola akses dokumen (owner/admin)
Route::get(
    '/documents/{document}/shares/list',
    [DocumentController::class, 'sharesListJson']
)->middleware('auth')->name('document.shares.list');

Route::post(
    '/documents/{document}/shares',
    [DocumentController::class, 'shareStore']
)->middleware('auth')->name('document.shares.store');

Route::delete(
    '/documents/{document}/shares/{user}',
    [DocumentController::class, 'shareDestroy']
)->middleware('auth')->name('document.shares.destroy');


require __DIR__.'/auth.php';
