<?php

use App\Http\Resources\ViewOrderResource;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test',function(){
    dd(app(App\Repositories\OrderRepository::class)->view(1));
});

Route::get('test2',function(){
   return  response()->json(new ViewOrderResource(app(App\Repositories\OrderRepository::class)->view(1)));
});
