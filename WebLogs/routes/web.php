<?php

use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);


Route::get('/logs/create', [App\Http\Controllers\LogsController::class, 'create']);

Route::post('/logs', [App\Http\Controllers\LogsController::class, 'store']);