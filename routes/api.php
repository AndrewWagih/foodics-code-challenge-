<?php

use Illuminate\Support\Facades\Route;


Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store']);
Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'show']);

