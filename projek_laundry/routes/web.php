<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController; 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TemplateController;


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



Route::prefix('/')->group(function () {
    Route::view('/', 'landing_page.beranda');
    Route::view('layanan', 'landing_page.layanan');
    Route::view('tentang_kami', 'landing_page.tentang_kami');
    Route::view('kontak', 'landing_page.kontak');
});

Route::controller(TemplateController::class)->group(function () {
    // Routing halaman templating_login (Master Template untuk login/register)
    Route::get('/template_login', 'template_login');
    // Routing halaman master template
    Route::get('/master', 'master');
    // Routing halaman landingPage
   
    
});



    Route::controller(AuthController::class)->group(function () {
        // Routing halaman register
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'store')->name('register.submit');
    });

    // Route login, logout
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

    
    // Routing halaman logout
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');


    Route::middleware(['auth'])->group(function () {
    
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
            Route::get('/data_jenis', 'index')->name('jenis_barang.data_jenis');
    
        
            // Routing tambah jenis_barang
            Route::get('/tambah_jenis', 'create');
            Route::post('/tambah_jenis', 'store');
        
            // Routing ubah jenis_barang
            Route::get('/ubah_jenis/{id}', 'edit');
            Route::post('/ubah_jenis/{id}', 'update')->name('name_edit_jenis');
        
            // Routing hapus jenis_barang
            Route::get('/hapus_jenis/{id}', 'destroy');
        });

    
        Route::controller(TransaksiController::class)->group(function () {

            Route::get('/data_transaksi', 'index')->name('transaksi.data_transaksi');
        
            Route::get('/tambah_transaksi', 'create');
            Route::post('/tambah_transaksi', 'store')->name('transaksi.tambah_transaksi');
            
            Route::get('/detail_transaksi/{id}', 'show')->name('transaksi.detail');

            Route::get('/ubah_transaksi/{id}', 'edit');
            Route::post('/ubah_transaksi/{id}', 'update')->name('name_edit_transaksi');
        
            // Ganti route hapus jadi method DELETE dan beri nama route
            Route::delete('/hapus_transaksi/{id}', 'destroy')->name('transaksi.destroy');
        });

    });

