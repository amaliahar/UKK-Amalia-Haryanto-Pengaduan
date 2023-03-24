<?php

namespace App\Http\Controllers;

use App\Models\Pengaduans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Barryvdh\DomPDF\Facades as PDF;

class PengaduansController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{
$pengaduans = pengaduans::latest()->paginate(500);

return view('pengaduans.index', compact('pengaduans'))
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
'isi' => 'required',
]);

$image = $request->file('image')->store('post-images/pengaduans');

$validated['image'] = $image;

Pengaduans::create($validated);

return redirect()->route('pengaduans.index')
->with('success', 'Add Success!');
}

/**
* Display the specified resource.
*
* @param \App\Models\Pengaduans $pengaduans
* @return \Illuminate\Http\Response
*/
public function show($id)
{
$pengaduans = Pengaduans::find($id);
return view('pengaduans.index', compact('pengaduans'));
}

/**
* Show the form for editing the specified resource.
*
* @param \App\Models\Pengaduans $pengaduans
* @return \Illuminate\Http\Response
*/
public function edit(Pengaduans $pengaduans)
{
return view('pengaduans.edit', compact('pengaduans'));
}

/**
* Update the specified resource in storage.
*
* @param \Illuminate\Http\Request $request
* @param \App\Models\Pengaduans $pengaduans
* @return \Illuminate\Http\Response
*/
public function update(Request $request, Pengaduans $pengaduans)
{
$rules = [
'image' => 'image|file',
'isi' => 'required',
];

$validated = $request->validate($rules);

if ($request->file('image')) {
if ($request->oldImage) {
Storage::delete($request->oldImage);
}
$validated['image'] = $request->file('image')->store('post-images/pengaduans');
};

$pengaduans->update($validated);

return redirect()->route('pengaduans.index')
->with('success', 'Update Success!');
}

/**
* Remove the specified resource from storage.
*
* @param \App\Models\Pengaduans $pengaduans
* @return \Illuminate\Http\Response
*/
public function destroy(Pengaduans $pengaduans)
{
//
}

// public function onlinePdf()
// {
// $laporan = Pengaduans::all();

// $pdf = PDF::loadView('pages.generate_pdf.CetakOnline', ['laporan' => $laporan]);

// return $pdf->download('laporan.pdf');
// }

public function tanggapan(Request $request, $id)
{
$edit = Pengaduans::findOrFail($id);
$edit->tanggapan = $request->tanggapan;
$edit->status = $request->status;
$edit->save();

return redirect('all-pengaduans');
}
}
