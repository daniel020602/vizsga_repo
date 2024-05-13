<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('posts',PostsController::class);
Route::resource('comments',CommentsController::class);