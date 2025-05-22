<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Municipalities;
use App\Http\Controllers\Attractions;

use App\Http\Controllers\App;
use App\Http\Controllers\Debug;
use App\Http\Controllers\System;

Route::get('/', [App::class, 'index'])->name('login');
Route::post('/login', [App::class, 'login'])->name('login_post');
Route::get('/register', [App::class, 'register_view'])->name('register');
Route::post('/register/create', [App::class, 'register'])->name('register_post');


Route::middleware(['auth:web'])->group(function () {
    Route::get('/system/municipality', [System::class, 'system'])->name('system_municipality');
    Route::post('/system/add_municipality', [System::class, 'add_municipality'])->name('add_municipality');
    Route::get('/system/delete_municipality', [System::class, 'delete_municipality'])->name('delete_municipality');
    
    Route::get('/system/attractions', [System::class, 'attractions'])->name('system_attractions');
    Route::post('/system/add_attraction', [System::class, 'add_attraction'])->name('add_attraction');
    Route::get('/system/delete_attraction', [System::class, 'delete_attraction'])->name('delete_attraction');

    Route::get('/system/festivals', [System::class, 'festival'])->name('system_festivals');
    Route::post('/system/add_festival', [System::class, 'add_festival'])->name('add_festival');
    Route::get('/system/delete_festival', [System::class, 'delete_festival'])->name('delete_festival');
    
    

    Route::get('/municipalities', [Municipalities::class, 'municipalities'])->name('municipalities');
    Route::get('/view_municipality', [Municipalities::class, 'view_municipality'])->name('view_municipality');
    Route::get('/attractions', [Attractions::class, 'attractions'])->name('attractions');




});
