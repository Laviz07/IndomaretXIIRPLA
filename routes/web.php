<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\PerusahaanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::post('/login', [AuthController::class, 'check']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::prefix('/dashboard')
    ->middleware(['auth', 'isAdmin'])
    ->group(function () {

        //perusahaan
        Route::get('/perusahaan', [PerusahaanController::class, 'index']);
        Route::get('/perusahaan/edit', [PerusahaanController::class, 'edit']);
        Route::post('/perusahaan/simpan', [PerusahaanController::class, 'simpan']);

        //cabang
        Route::get('/cabang', [CabangController::class, 'index']);
        Route::get('/cabang/tambah', [CabangController::class, 'tambah']);
        Route::post('/cabang/simpan', [CabangController::class, 'simpan']);
        Route::get('/cabang/edit/{id}', [CabangController::class, 'edit']);
        Route::delete('/cabang/hapus/{id}', [CabangController::class, 'hapus']);

        //barang
        Route::get('/barang', [BarangController::class, 'index']);
        Route::get('/barang/tambah', [BarangController::class, 'tambah']);
        Route::post('/barang/simpan', [BarangController::class, 'simpan']);
        Route::get('/barang/edit/{id}', [BarangController::class, 'edit']);
        Route::delete('/barang/hapus/{id}', [BarangController::class, 'hapus']);
    });
