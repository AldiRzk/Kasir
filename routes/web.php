<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailpenjualanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showlogin'] );
Route::get('/actionlogin', [LoginController::class, 'actionlogin'] )->name('login');
Route::get('/actionlogout', [LoginController::class, 'actionlogout'] )->name('logout');

Route::middleware('auth')->group(function () {
Route::get('/', [DashboardController::class, 'index'] );

Route::get('/user', [UserController::class, 'index'] );
Route::get('/user/tambah', [UserController::class, 'create'] );
Route::post('/user/simpan', [UserController::class, 'store'] );
Route::get('/user/{id}/edit', [UserController::class, 'edit'] );
Route::post('/user/{id}/update', [UserController::class, 'update'] );
Route::get('/user/{id}/hapus', [UserController::class, 'destroy'] );

Route::get('/pelanggan', [PelangganController::class, 'index'] );
Route::get('/pelanggan/tambah', [PelangganController::class, 'create'] );
Route::post('/pelanggan/simpan', [PelangganController::class, 'store'] );
Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'] );
Route::post('/pelanggan/{id}/update', [PelangganController::class, 'update'] );
Route::get('/pelanggan/{id}/hapus', [PelangganController::class, 'destroy'] );

Route::get('/penjualan', [PenjualanController::class, 'index'] );
Route::get('/penjualan/tambah', [PenjualanController::class, 'create'] );
Route::post('/penjualan/simpan', [PenjualanController::class, 'store'] );
Route::get('/penjualan/{id}/edit', [PenjualanController::class, 'edit'] );
Route::post('/penjualan/{id}/update', [PenjualanController::class, 'update'] );
Route::get('/penjualan/{id}/hapus', [PenjualanController::class, 'destroy'] );

Route::get('/produk', [ProdukController::class, 'index'] );
Route::get('/produk/tambah', [ProdukController::class, 'create'] );
Route::post('/produk/simpan', [ProdukController::class, 'store'] );
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'] );
Route::post('/produk/{id}/update', [ProdukController::class, 'update'] );
Route::get('/produk/{id}/hapus', [ProdukController::class, 'destroy'] );

Route::get('/detail/{id}', [DetailpenjualanController::class, 'index'] );
Route::get('/detail/{id}/tambah', [DetailpenjualanController::class, 'create'] );
Route::post('/detail/{id}/simpan', [DetailpenjualanController::class, 'store'] );
Route::get('/detail/{id}/edit', [DetailpenjualanController::class, 'edit'] );
Route::get('/detail/{id}/hapus', [DetailpenjualanController::class, 'destroy'] );
Route::post('/detail/{id}/bayar', [PenjualanController::class, 'bayar'] );
Route::get('/detail/{id}/struk', [PenjualanController::class, 'struk'] );
});
