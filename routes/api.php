<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);       // List all
Route::post('/products', [ProductController::class, 'store']);      // Create product
Route::put('/products/{id}', [ProductController::class, 'update']); // Update product
Route::delete('/products/{id}', [ProductController::class, 'destroy']); // Delete product
