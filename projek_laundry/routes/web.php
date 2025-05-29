<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LoginController;


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
    Route::view('template_login', 'templating.template_login');
    Route::view('master', 'templating.master');
});


Route::middleware(['web'])->group(function () {

    Route::controller(AuthController::class)->group(function () {
        // Routing halaman register
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'store')->name('register.submit');
    });

    // Route login, logout
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

    Route::middleware(['auth'])->group(function () {
    
        Route::controller(KaryawanController::class)->group(function () {
            Route::get('/data_karyawan', 'index');
            Route::get('/tambah_karyawan', 'create');
            Route::post('/tambah_karyawan', 'store');
            Route::get('/ubah_karyawan/{id}', 'edit');
            Route::post('/ubah_karyawan/{id}', 'update')->name('name_edit_karyawan');
            Route::get('/hapus_karyawan/{id}', 'destroy');
        });

        Route::controller(PelangganController::class)->group(function () {
            Route::get('/data_pelanggan', 'index');
            Route::get('/tambah_pelanggan', 'create');
            Route::post('/tambah_pelanggan', 'store');
            Route::get('/ubah_pelanggan/{id}', 'edit');
            Route::post('/ubah_pelanggan/{id}', 'update')->name('name_edit_pelanggan');
            Route::get('/hapus_pelanggan/{id}', 'destroy');
        });

        Route::controller(JenisBarangController::class)->group(function () {
            Route::get('/data_jenis', 'index');
            Route::get('/tambah_jenis', 'create');
            Route::post('/tambah_jenis', 'store');
            Route::get('/ubah_jenis/{id}', 'edit');
            Route::post('/ubah_jenis/{id}', 'update')->name('name_edit_jenis');
            Route::get('/hapus_jenis/{id}', 'destroy');
        });

        Route::post('/logout', function () {
            Auth::logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect('/');
        })->name('logout');

    });

    
});

  

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');





