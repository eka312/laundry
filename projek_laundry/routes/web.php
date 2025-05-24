<?php

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
    return view('landing_page/beranda');
});

Route::get('/layanan', function () {
    return view('landing_page/layanan');
});

Route::get('/tentang_kami', function () {
    return view('landing_page/tentang_kami');
});

Route::get('/kontak', function () {
    return view('landing_page/kontak');
});
