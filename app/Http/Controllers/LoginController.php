<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/')->with('success', 'Login Berhasil');
        }
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('user.register');
    }

    public function register_action(Request $request)
    {
        $request->validate([
        'nik' => 'required',
        'name' => 'required',
        'username' => 'required|unique:tb_user',
        'password' => 'required',
        'telp' => 'required'
        ]);
    }
}
