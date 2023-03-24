<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;

class MasyarakatController extends Controller
{
    public function index()
    {
        $dt_masyarakat = Masyarakat::all();
        return view('user.index', compact('dt_masyarakat'));
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
}
