<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', ProductController::class);
Route::resource('/locations', LocationController::class);
Route::resource('/movements', MovementController::class);
