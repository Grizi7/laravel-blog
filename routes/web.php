<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{id}', [HomeController::class, 'post'])->name('post');

Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        return view('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('posts');
        Route::get('/add', [AdminPostController::class, 'add'])->name('post.add');
        Route::post('/add', [AdminPostController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('post.edit');
        Route::patch('/update/{id}', [AdminPostController::class, 'update'])->name('post.update');
        Route::patch('/publishControl', [AdminPostController::class, 'publishControl'])->name('post.publishControl');
        Route::delete('/delete/{id}', [AdminPostController::class, 'delete'])->name('post.delete');
        Route::delete('/delete/{id}', [AdminPostController::class, 'delete'])->name('post.delete');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::get('/post/edit', function () {
    //     return "add <br> <a href=' " .route('post.edit')." ' >Profile</a>";
    // })->name('post.add');
    // Route::get('/post/add', function () {
    //     return "edit <br> <a href=' ".route('post.add')." '>Profile</a>";
    // })->name('post.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
