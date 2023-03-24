<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $pengaduan = Pengaduan::all()->count();
        return view('pengaduan.index', compact('pengaduan'));

        $pengaduan = Pengaduan::count();
        $proses = Pengaduan::where('status', 'proses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();

        return view('user.index', [
            'pengaduan' => $pengaduan,
            'proses' => $proses,
            'selesai' => $selesai,
        ]);
    }

    public function show($id){
        $pengaduan = Pengaduan::count();
        $proses = Pengaduan::where('status', 'proses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();
        return view('user.index', compact('pengaduan'));
    }
}
