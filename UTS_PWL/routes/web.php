<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index']);

Route::prefix('product')->group(function() {
    Route::get('/category/food-beverage', [ProductController::class, 'food_beverage']);
    Route::get('/category/beauty-health', [ProductController::class, 'beauty_health']);
    Route::get('/category/home-care', [ProductController::class, 'home_care']);
    Route::get('/category/baby-kid', [ProductController::class, 'baby_kid']);
});

Route::get('user/{id}/name/{name}', [UserController::class, 'index']);
Route::get('penjualan', [PenjualanController::class, 'index']);
Route::get('/level', [LevelController::class, 'index']);
Route::get('/kategori', [KategoriController::class, 'index']);


Route::group(['prefix' => 'user'], function() {
    Route::get('/',  [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::group(['prefix' => 'level'], function() {
    Route::get('/',  [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

Route::group(['prefix' => 'kategori'], function() {
    Route::get('/',  [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::group(['prefix' => 'barang'], function() {
    Route::get('/',  [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

Route::group(['prefix' => 'supplier'], function() {
    Route::get('/',  [SupplierController::class, 'index']);
    Route::post('/list', [SupplierController::class, 'list']);
    Route::get('/create', [SupplierController::class, 'create']);
    Route::post('/', [SupplierController::class, 'store']);
    Route::get('/{id}', [SupplierController::class, 'show']);
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);
    Route::put('/{id}', [SupplierController::class, 'update']);
    Route::delete('/{id}', [SupplierController::class, 'destroy']);
});

Route::prefix('stok')->name('stok.')->group(function () {
    Route::get('/', [StokController::class, 'index'])->name('index');
    Route::get('/create', [StokController::class, 'create'])->name('create');
    Route::post('/', [StokController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [StokController::class, 'edit'])->name('edit');
    Route::put('/{id}', [StokController::class, 'update'])->name('update');
    Route::delete('/{id}', [StokController::class, 'destroy'])->name('destroy');
});


Route::prefix('penjualan')->name('penjualan.')->group(function () {
    Route::get('/', [PenjualanController::class, 'index'])->name('index');
    Route::post('/store', [PenjualanController::class, 'store'])->name('store');
    Route::post('/jual/{barang}', [PenjualanController::class, 'jual'])->name('jual');
});
