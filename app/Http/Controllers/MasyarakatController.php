<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Auth;

class MasyarakatController extends Controller
{
    public function index()
    {
        // $dt_masyarakat = Masyarakat::all();
        // return view('user.index', compact('dt_masyarakat'));

        if(Auth::guard('petugas')->check()) {
            return abort(404);
        }
        elseif(Auth::guard('masyarakat')->check()) {
            return redirect()->intended('/user.index');
        }
        else{
            return view('login.index');
        }
    }

    public function create()
    {
        return view('user.index');
    }

    public function store(Request $request)
    {
        $dt_masyarakat = New Masyarakat();
        $dt_masyarakat->nik = $request->nik;
        $dt_masyarakat->nama = $request->nama;
        $dt_masyarakat->email = $request->email;
        $dt_masyarakat->password = $request->password;
        $dt_masyarakat->telp = $request->telp;
        $dt_masyarakat->save();
    }

    public function edit(){
        $dt_masyarakat = Masyarakat::all();
        return view('user.edit', compact('dt_masyarakat'));
    }

    public function update(Request $request){
        $dt_masyarakat = Masyarakat::find($id);
        $dt_masyarakat->nik = $request->nik;
        $dt_masyarakat->nama = $request->nama;
        $dt_masyarakat->email = $request->email;
        $dt_masyarakat->password = $request->password;
        $dt_masyarakat->no_telp = $request->no_telp;
        $dt_masyarakat->update();
        return redirect ('/masyarakat');
    }

    public function destroy($id)
    {
        $dt_masyarakat = Masyarakat::find($id);
        $dt_masyarakat->delete();
        return redirect('/masyarakat');
    }

    public function authentication(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('masyarakat')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('user.index')->with('success', 'Anda Berhasil Login! Silahkan Isi Pengaduan Anda.');
        }

        return back()->with('loginError', 'Login Failed');
    }
}
