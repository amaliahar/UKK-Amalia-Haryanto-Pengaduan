<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');

        if (Session::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('login')->with('success', 'Login Berhasil');
            }
            return back()->with('registerError', 'Register Anda Gagal!');

            Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');
            return view('user.index');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nik' => 'required',
            'nama'  => 'required',
            'telp' => 'required',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/register')
            ->with('Berhasil', 'Daftar telah Berhasil!, Silahkan Masuk');

            Alert::success('Congrats', 'You\'ve Successfully Registered');
    }
}
