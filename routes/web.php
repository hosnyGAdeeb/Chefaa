<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Web\MainController::class, 'home']);
Route::resource('products', \App\Http\Controllers\Web\ProductsController::class);
Route::resource('pharmacies', \App\Http\Controllers\Web\PharmaciesController::class);
Route::get('search', [\App\Http\Controllers\Web\ProductsController::class, 'search']);


// TODO Search Command
// TODO Apis
