<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', \App\Http\Controllers\Api\ProductsController::class);
Route::apiResource('pharmacies', \App\Http\Controllers\Api\PharmaciesController::class);
