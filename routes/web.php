<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CallRequestController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');  
Route::get('/contact', [HomeController::class, 'contact'])->name('contact'); 
Route::post('/contact', [CallRequestController::class, 'store'])->name('contact.sent'); 
Route::get('/blog', [PostController::class, 'index'])->name('blog.posts');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post');
Route::get('/user/{id}', [ProfileController::class, 'show'])->name('user');

Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        return view('admin.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin');;
    Route::prefix('posts')->group(function () {
        Route::get('/', [AdminPostController::class, 'index'])->name('posts');
        Route::get('/add', [AdminPostController::class, 'add'])->name('post.add');
        Route::post('/add', [AdminPostController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [AdminPostController::class, 'edit'])->name('post.edit');
        Route::patch('/update/{id}', [AdminPostController::class, 'update'])->name('post.update');
        Route::patch('/publishControl', [AdminPostController::class, 'publishControl'])->name('post.publishControl');
        Route::delete('/delete/{id}', [AdminPostController::class, 'delete'])->name('post.delete');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('users');
        Route::get('/add', [AdminUserController::class, 'add'])->name('user.add');
        Route::post('/add', [AdminUserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('user.edit');
        Route::patch('/update/{id}', [AdminUserController::class, 'update'])->name('user.update');
        Route::delete('/delete/{id}', [AdminUserController::class, 'delete'])->name('user.delete');
    });
    Route::prefix('call-requests')->group(function () {
        Route::get('/', [CallRequestController::class, 'index'])->name('call-requests');
        Route::delete('/delete/{id}', [CallRequestController::class, 'delete'])->name('request.delete');
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/myPosts', [PostController::class, 'myPosts'])->name('myPosts');
    Route::get('/add/post', [PostController::class, 'add'])->name('add.post');
    Route::post('/store/post', [PostController::class, 'store'])->name('store.post');
    Route::get('/edit/post/{id}', [PostController::class, 'edit'])->name('edit.post');
    Route::patch('/update/post/{id}', [PostController::class, 'update'])->name('update.post');
    Route::delete('/delete/post/{id}', [PostController::class, 'delete'])->name('delete.post');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
