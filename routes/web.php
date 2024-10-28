<?php

use App\Http\Resources\ViewOrderResource;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
