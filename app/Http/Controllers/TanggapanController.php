<?php

namespace App\Http\Controllers;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index(){
        $data_tanggapan = Tanggapan::all();
        return view('admin.tanggapan.index', compact('data_tanggapan'));
    }

    public function create(){
        return view('admin.tanggapan.index');
    }

    public function store(Request $request){
        $data_tanggapan = new Tanggapan();
        $data_tanggapan->id_tanggapan = $request->id_tanggapan;
        $data_tanggapan->id_pengaduan = $request->id_pengaduan;
        $data_tanggapan->tgl_tanggapan = $request->tgl_tanggapan;
        $data_tanggapan->tanggapan = $request->tanggapan;
        $data_tanggapan->id_petugas = $request->id_petugas;
        $data_tanggapan->save();
        return redirect('/tanggapan');
    }

    public function edit(){
        $data_tanggapan = Tanggapan::all();
        return view('admin.tanggapan.edit', compact('data_tanggapan'));
    }

    public function update(Request $request, $id){
        $data_tanggapan = Tanggapan::find($id);
        $data_tanggapan->id_tanggapan = $request->id_tanggapan;
        $data_tanggapan->id_pengaduan = $request->id_pengaduan;
        $data_tanggapan->c = $request->tgl_tanggapan;
        $data_tanggapan->tanggapan = $request->tanggapan;
        $data_tanggapan->id_petugas = $request->id_petugas;
        $data_tanggapan->update();
        return redirect ('/tanggapan');
    }

    public function destroy($id){
        $data_tanggapan = Tanggapan::find($id);
        $data_tanggapan->delete();
        return redirect('/tanggapan');
    }
}
