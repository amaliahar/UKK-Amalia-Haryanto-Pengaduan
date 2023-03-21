<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/register')->with('success', 'Register Berhasil!, Silahkan Login');
    }
}
