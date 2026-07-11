<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/post-edit/{id}', [PostController::class, 'edite']);
});
Route::view('create-post', 'create-post');
// Route::post('store-post', [PostController::class, 'create']);
Route::post('/store-post', [PostController::class, 'store']);
require __DIR__ . '/auth.php';
