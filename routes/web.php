<?php

use Illuminate\Support\Facades\Route;

//Route::inertia('/', 'Home');

Route::get('/', function () {
    return \App\Http\Resources\PharmaciesResource::collection(\App\Models\Pharmacy::all());
//    return \App\Http\Resources\ProductsResource::collection(\App\Models\Product::all());
});
