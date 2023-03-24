<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;
use PDF;

class LaporanController extends Controller
{
    public function print()
    {
        $pdf = PDF::loadview('myPDF', $data);
        return $pdf->download('laporan-pdf.pdf');

        $data = ['title' => 'Selamat Datang di Pengaduan Masyarakat'];

            $pdf = PDF::loadView('myPDF', $data);
            return $pdf->download('laporan-pdf.pdf');
    }

    public function laporan()
    {
        $pengaduan = Pengaduan::query();
        return view('laporan', [
            'pengaduan' => $pengaduan->get(),
        ]);
    }

    public function export(){
        $pengaduan = Pengaduan::query();
        $pdf = PDF::loadview('export',['pengaduan'=>$pengaduan]);
    	return $pdf->download('laporan-pdf.pdf');
    }

    public function index(){
        $pengaduan = Pengaduan::count();
        $user = User::count();
        return view('laporan', [
            'pengaduan' => $pengaduan,
            'user' => $user,
        ]);
    }

    public function show($id){
        $user = User::find($id);
        $username = User::count();
        return User::find($id);
        User::count();

        $pengaduan = Pengaduan::count();
        $proses = Pengaduan::where('status', 'proses')->count();
        return view('laporan', [
            'pengaduan' => $pengaduan,
            'proses' => $proses,
            'selesai' => $selesai,
        ]);
    }

    public function generatepdf()
    {
        $validasis = Pengaduan::all();
        $pdf = PDF::loadview('laporan', compact('laporan'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->download('laporan-pdf.pdf');
    }
}
