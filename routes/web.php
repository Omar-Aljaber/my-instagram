<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Create & Display Posts
Route::get('/p/create', [PostController::class, 'create'])->name('create_post')->middleware('auth');
Route::post('/p/create', [PostController::class, 'store'])->name('store_post')->middleware('auth');
Route::get('/p/{post:slug}', [PostController::class, 'show'])->name('show_post')->middleware('auth');

// Edit & Delete Posts
Route::get('/p/{post:slug}/edit', [PostController::class, 'edit'])->name('edit_post')->middleware('auth');
Route::patch('/p/{post:slug}/update', [PostController::class, 'update'])->name('update_post')->middleware('auth');
Route::delete('/p/{post:slug}/delete', [PostController::class, 'destroy'])->name('delete_post')->middleware('auth');

// Add & Edit Comments
Route::post('/p/{post:slug}/comment', [CommentController::class, 'store'])->name('store_comment')->middleware('auth');

require __DIR__.'/auth.php';
