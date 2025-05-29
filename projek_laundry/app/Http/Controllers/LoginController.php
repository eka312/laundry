<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function authenticate(Request $request)
    {
        // validasi input
        $credentials = $request->validate([
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // coba autentikasi
        if (Auth::attempt($credentials)) {
           
            $request->session()->regenerate();

            // pakai intended agar kembali ke URL semula
            return redirect()->intended('/data_karyawan');
        }

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     dd('login berhasil');
        //     return redirect()->intended('data_karyawan');
        // } else {
        //     dd('login gagal');
        //     return back()->with('error', 'Email atau password salah');
        // }

        // gagal login
        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }
}
