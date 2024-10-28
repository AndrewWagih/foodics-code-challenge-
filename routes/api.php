<?php

use Illuminate\Support\Facades\Route;


Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store']);
