<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan'));
    }

    public function show($id){
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan'));
    }
}
