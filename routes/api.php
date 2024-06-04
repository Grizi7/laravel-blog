<?php

use App\Http\Controllers\CallRequestController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Home Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/comment/add/{id}', [CommentController::class, 'store'])->name('store.comment');
});

// Admin Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::patch('/call-requests/read/{id}', [CallRequestController::class, 'read'])->name('read.request');
});