<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\Facades as PDF;

class PengaduanController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$pengaduan = pengaduan::latest()->paginate(500);

return view('pengaduan.index', compact('pengaduan'))
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
$validated = $request->validate([
'image' => 'image|file|required',
'nik' => 'required',
'isi' => 'required',
'status'=> 'required',
]);

$image = $request->file('image')->store('post-images/pengaduan');

$validated['image'] = $image;

Pengaduan::create($validated);

return redirect()->route('pengaduan.index')
->with('success', 'Add Success!');
}

/**
* Display the specified resource.
*
* @param \App\Models\Pengaduan $pengaduan
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$detail = Pengaduan::find($id);
return view('pengaduan.detail', compact('detail'));
}

/**
* Show the form for editing the specified resource.
*
* @param \App\Models\Pengaduan $pengaduan
* @return \Illuminate\Http\Response
*/
public function edit(Pengaduan $pengaduan)
{
return view('pengaduan.edit', compact('pengaduan'));
}

/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param \App\Models\Pengaduan $pengaduan
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Pengaduan $pengaduan)
{
$rules = [
'image' => 'image|file',
'nik' => 'required',
'isi' => 'required',
'status' => 'required'
];

$validated = $request->validate($rules);

if ($request->file('image')) {
if ($request->oldImage) {
Storage::delete($request->oldImage);
}
$validated['image'] = $request->file('image')->store('post-images/pengaduan');
};

$pengaduan->update($validated);

return redirect()->route('pengaduan.index')
->with('success', 'Update Success!');
}

/**
* Remove the specified resource from storage.
*
* @param \App\Models\Pengaduan $pengaduan
* @return \Illuminate\Http\Response
*/
public function destroy(Pengaduan $pengaduan)
{
if ($pengaduan->image) {
Storage::delete($pengaduan->image);
}

$pengaduan->delete($pengaduan->id);

return redirect()->route('pengaduan.index')
->with('success', 'Delete Success!');
}

// public function onlinePdf()
// {
// $laporan = Pengaduan::all();

// $pdf = PDF::loadView('pages.generate_pdf.CetakOnline', ['laporan' => $laporan]);

// return $pdf->download('laporan.pdf');
// }

public function tanggapan(Request $request, $id)
{
$edit = Pengaduan::findOrFail($id);
$edit->tanggapan = $request->tanggapan;
$edit->status = $request->status;
$edit->save();

return redirect('all-pengaduan');
}
}
