<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\Facades as PDF;

class TanggapanController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$tanggapan = Tanggapan::latest()->paginate(500);

return view('tanggapan.index', compact('tanggapan'))
->with('i', (request()->input('page', 1) - 1) * 500);
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
//
}

/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
    $dt_tanggapan = new Tanggapan();
    $dt_tanggapan->id_tanggapan = $request->id_tanggapan;
    $dt_tanggapan->id_pengaduan = $request->id_pengaduan;
    $dt_tanggapan->tgl_tanggapan = $request->tgl_tanggapan;
    $dt_tanggapan->tanggapan = $request->tanggapan;
    $dt_tanggapan->id_petugas = $request->id_petugas;
    $dt_tanggapan->save();
    return redirect('/tanggapan');
}

/**
* Display the specified resource.
*
* @param \App\Models\Tanggapan $tanggapan
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$tanggapan = Tanggapan::find($id);
return view('tanggapan.index', compact('tanggapan'));
}

/**
* Show the form for editing the specified resource.
*
* @param \App\Models\Tanggapan $tanggapan
* @return \Illuminate\Http\Response
*/
public function edit(Tanggapan $tanggapan)
{
    $dt_tanggapan = Tanggapan::all();
return view('tanggapan.edit', compact('dt_tanggapan'));
}

/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param \App\Models\Tanaggapan $tanggapan
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
    $dt_tanggapan = Tanggapan::find($id);
    $dt_tanggapan->id_tanggapan = $request->id_tanggapan;
    $dt_tanggapan->id_pengaduan = $request->id_pengaduan;
    $dt_tanggapan->c = $request->tgl_tanggapan;
    $dt_tanggapan->tanggapan = $request->tanggapan;
    $dt_tanggapan->id_petugas = $request->id_petugas;
    $dt_tanggapan->update();
    return redirect ('/tanggapan');
}

/**
* Remove the specified resource from storage.
*
* @param \App\Models\Tanggapan $tanggapan
* @return \Illuminate\Http\Response
*/
public function destroy(Tanggapan $tanggapan)
{
$tanggapan->delete($tanggapan->id);
$dt_tanggapan = Tanggapan::find($id);
$dt_tanggapan->delete();
return redirect()->route('tanggapan.index')
->with('success', 'Delete Success!');
}

// public function onlinePdf()
// {
// $laporan = Tanggapan::all();

// $pdf = PDF::loadView('pages.generate_pdf.CetakOnline', ['laporan' => $laporan]);

// return $pdf->download('laporan.pdf');
// }

public function tanggapan(Request $request, $id)
{
$edit = Tanggapan::findOrFail($id);
$edit->tanggapan = $request->tanggapan;
$edit->status = $request->status;
$edit->save();

return redirect('all-tanggapan');
}
}
