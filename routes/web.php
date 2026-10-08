<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockOutController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::resource('categories', CategoryController::class);

Route::resource('products', ProductController::class);

// TAMBAHKAN BARIS INI UNTUK RIWAYAT STOK
Route::get('/stock-history', [StockOutController::class, 'history'])->name('stock.history');

Route::resource('stock-outs', StockOutController::class);
