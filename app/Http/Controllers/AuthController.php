<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function prosesLogin(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        // if (Auth::guard('admin')->attempt($credentials)) {
        //     $request->session()->regenerate();
 
        //     return redirect()->intended('dashboard');
        // }

        if (Auth::guard('pengguna')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'username' => 'Username atau Password salah!',
        ])->onlyInput('username');
    }

    public function prosesRegister(Request $request)
    {
        $request->validate([
            'username'     => 'required|min:5',
            'password'   => 'required|min:5',
            'nama'   => 'required',
            'alamat'   => 'required',
            'no_telepon'   => 'required',
            'no_sim'   => 'required',
        ]);

        $pengguna = new Pengguna([
            'username'   => $request->username,
            'password' => Hash::make($request['password']),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'no_sim' => $request->no_sim,
        ]);
        $pengguna->save();

        return redirect()->route('login')->with('success', 'Registrasi Berhasil. Silahkan login!');
    }

    public function logout(Request $request) : RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
