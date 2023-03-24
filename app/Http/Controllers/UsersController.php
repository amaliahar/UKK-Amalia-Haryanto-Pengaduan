<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengaduan;

class UsersController extends Controller
{
    public function index(){
        $data = array(
            'id' => "user",
            'nama' => "nama",
            'username' => "user",
            'user' => User::all(),
            'username' => User::count(),
        );
        return view('user.index')->with($data);

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
        $user = User::find($id);
        $username = User::count();
        return User::find($id);
        User::count();

        $pengaduan = Pengaduan::count();
        $proses = Pengaduan::where('status', 'proses')->count();
        return view('user.index', [
            'pengaduan' => $pengaduan,
            'proses' => $proses,
            'selesai' => $selesai,
        ]);
    }


}


