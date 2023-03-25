<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;
use App\Models\Pengaduans;

class HomeController extends Controller
{
    public function index(){
        $pengaduans = Pengaduan::all()->count();
        $pengaduans = Pengaduan::count();
        $pengaduan = Pengaduan::all();
        return view('pengaduans.index', compact('pengaduans', 'pengaduansss'));

        $pengaduans = Pengaduan::count();
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
