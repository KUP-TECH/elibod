<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Municipalities;
use App\Http\Controllers\Attractions;

use App\Http\Controllers\Debug;
use App\Http\Controllers\System;

Route::get('/', [System::class, 'system'])->name('index');

Route::get('/system/municipality', [System::class, 'system'])->name('system_municipality');
Route::post('/system/add_municipality', [System::class, 'add_municipality'])->name('add_municipality');
Route::get('/system/delete_municipality', [System::class, 'delete_municipality'])->name('delete_municipality');

Route::get('/system/attractions', [System::class, 'attractions'])->name('system_attractions');
Route::post('/system/add_attraction', [System::class, 'add_attraction'])->name('add_attraction');
Route::get('/system/delete_attraction', [System::class, 'delete_attraction'])->name('delete_attraction');


Route::get('/attractions', [Attractions::class, 'attractions'])->name('attractions');

