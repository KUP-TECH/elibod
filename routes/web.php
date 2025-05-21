<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Municipalities;

use App\Http\Controllers\Debug;
use App\Http\Controllers\System;

Route::get('/', [System::class, 'system'])->name('index');

Route::get('/system/municipality', [System::class, 'system'])->name('system_municipality');
Route::post('/system/add_municipality', [System::class, 'add_municipality'])->name('add_municipality');
Route::get('/system/delete_municipality', [System::class, 'delete_municipality'])->name('delete_municipality');


Route::get('/municipalities', [Municipalities::class, 'municipalities'])->name('municipalities');