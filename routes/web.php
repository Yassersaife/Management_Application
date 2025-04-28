<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('dashboard');
Route::resource('/products', ProductController::class);
Route::resource('/locations', LocationController::class);
Route::resource('/movements', MovementController::class);
Route::get('/report',[ReportController::class,'productBalance'])->name('report');