<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index']);
Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store']);
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show']);

Route::resource('users', UserController::class);