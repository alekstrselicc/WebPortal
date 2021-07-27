<?php

use Illuminate\Support\Facades\Route;


Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

//Route::get("/download",[App\Http\Controllers\HomeController::class,'download']);


Route::get('/logs/create', [App\Http\Controllers\LogsController::class, 'create']);

Route::post('/logs', [App\Http\Controllers\LogsController::class, 'store']);

Route::get("/filtered/{logId}",[App\Http\Controllers\LogsController::class,'show']);

Route::get("/download",[App\Http\Controllers\LogsController::class,'exportExcelFile']);


//Route::get("/{logId}",[App\Http\Controllers\LogsController::class,'show']);