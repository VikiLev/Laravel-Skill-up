<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/posts', [PostController::class, 'index' ])->name('posts.index');

Route::get('/posts/{post}', [PostController::class, 'show' ])->name('posts.show');

Route::post('/posts/{post}/like', [PostController::class, 'like' ])->name('posts.like');
