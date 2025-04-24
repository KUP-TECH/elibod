<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Debug;


Route::get('/', [Debug::class, 'index'])->name('index');
Route::get('/', [Debug::class, 'page'])->name('page');
Route::get('/', [Debug::class, 'loginpage'])->name('loginpage');
Route::get('/', [Debug::class, 'signuppage'])->name('signuppage');
Route::get('/', [Debug::class, 'homepage'])->name('homepage');
