<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('tasks',TasksController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
