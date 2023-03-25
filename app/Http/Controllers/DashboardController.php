<?php

namespace App\Http\Controllers;

use App\Models\dashboard;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Models\Masyarakat;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proses = Pengaduan::where('status', 'proses')->get()->count();
        $selesai = Pengaduan::where('status', 'selesai')->get()->count();
        $pengaduan = Pengaduan::all()->count();

        return view('dashboard', [
            'proses' => $proses,
            'selesai' => $selesai,
            'pengaduan' => $pengaduan, compact('proses', 'selesai', 'pengaduan')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dashboard $dashboard)
    {
        //
    }

    public function showProses()
    {
        $pengaduan = Pengaduan::where('status', 'proses')->get();
        return view('Pengaduan.index', ['pengaduan'=> $pengaduan]);
    }

    public function showSelesai()
    {
        $pengaduan = Pengaduan::where('status', 'selesai')->get();
        return view('Pengaduan.index', ['pengaduan'=> $pengaduan]);
    }

}
