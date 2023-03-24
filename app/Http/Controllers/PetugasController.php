<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function index(){
        $dt_petugas = Petugas::all();
        return view('admin.petugas.index', compact('dt_petugas'));
    }

    public function create(){
        return view('admin.petugas.index');
    }

    public function store(Request $request){
        $dt_petugas = new Petugas();
        $dt_petugas->id_pengaduan = $request->id_pengaduan;
        $dt_petugas->nik = $request->nik;
        $dt_petugas->nama = $request->nama;
        $dt_petugas->email = $request->email;
        $dt_petugas->password = $request->password;
        $dt_petugas->no_telp = $request->no_telp;
        $dt_petugas->save();
        return redirect('/petugas');
    }

    public function edit(){
        $dt_petugas = Petugas::all();
        return view('admin.petugas.edit', compact('dt_petugas'));
    }

    public function update(Request $request, $id){
        $dt_petugas = Petugas::find($id);
        $dt_petugas->nik = $request->nik;
        $dt_petugas->nama = $request->nama;
        $dt_petugas->email = $request->email;
        $dt_petugas->password = $request->password;
        $dt_petugas->no_telp = $request->no_telp;
        $dt_petugas->update();
        return redirect ('/petugas');
    }

    public function destroy($id){
        $dt_petugas = Petugas::find($id);
        $dt_petugas->delete();
        return redirect('/petugas');
    }
}
