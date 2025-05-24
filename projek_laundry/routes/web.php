<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController;


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


Route::controller(TemplateController::class)->group(function () {
    // Routing halaman templating_login (Master Template untuk login/register)
    Route::get('/template_login', 'template_login');
    // Routing halaman master template
    Route::get('/master', 'master');
    // Routing halaman landingPage
   
    
});

Route::middleware(['auth'])->group(function () {
   
});

 Route::controller(KaryawanController::class)->group(function () {
        // Routing halaman data karyawan
        Route::get('/data_karyawan', 'index');
    
        // Routing tambah karyawan
        Route::get('/tambah_karyawan', 'create');
        Route::post('/tambah_karyawan', 'store');
    
        // Routing ubah karyawan
        Route::get('/ubah_karyawan/{id}', 'edit');
        Route::post('/ubah_karyawan/{id}', 'update')->name('name_edit_karyawan');
    
        // Routing hapus karyawan
        Route::get('/hapus_karyawan/{id}', 'destroy');
    });

    Route::controller(PelangganController::class)->group(function () {
        // Routing halaman data pelanggan
        Route::get('/data_pelanggan', 'index');
    
        // Routing tambah pelanggan
        Route::get('/tambah_pelanggan', 'create');
        Route::post('/tambah_pelanggan', 'store');
    
        // Routing ubah pelanggan
        Route::get('/ubah_pelanggan/{id}', 'edit');
        Route::post('/ubah_pelanggan/{id}', 'update')->name('name_edit_pelanggan');
    
        // Routing hapus pelanggan
        Route::get('/hapus_pelanggan/{id}', 'destroy');
    });

    Route::controller(JenisBarangController::class)->group(function () {
        // Routing halaman data jenis_barang
        Route::get('/data_jenis_barang', 'index');
    
        // Routing tambah jenis_barang
        Route::get('/tambah_jenis_barang', 'create');
        Route::post('/tambah_jenis_barang', 'store');
    
        // Routing ubah jenis_barang
        Route::get('/ubah_jenis_barang/{id}', 'edit');
        Route::post('/ubah_jenis_barang/{id}', 'update')->name('name_edit_jenis_barang');
    
        // Routing hapus jenis_barang
        Route::get('/hapus_jenis_barang/{id}', 'destroy');
    });

    
     Route::controller(TransaksiController::class)->group(function () {
        // Routing halaman data transaksi
        Route::get('/data_transaksi', 'index');
    
        // Routing tambah transaksi
        Route::get('/tambah_transaksi', 'create');
        Route::post('/tambah_transaksi', 'store');
    
        // Routing ubah transaksi
        Route::get('/ubah_transaksi/{id}', 'edit');
        Route::post('/ubah_transaksi/{id}', 'update')->name('name_edit_transaksi');
    
        // Routing hapus transaksi
        Route::get('/hapus_transaksi/{id}', 'destroy');
    });





Route::controller(AuthController::class)->group(function () {
    // Routing halaman login
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'authenticate')->name('login.submit');
});

// Routing halaman logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');


