<?php

namespace App\Http\Controllers;

use App\Models\Pengaduans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

use Barryvdh\DomPDF\Facades as PDF;

class PengaduansController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index(Request $request)
{
    // $pengaduans = Pengaduans::where('nik', Auth::guard('masyarakat')->user()->nik)->paginate(5);

    $pengaduansss = Pengaduans::when($request->search, function ($query) use ($request) {
        $query->where('isi', 'like', "%{$request->search}%");
    });
    // ->where('nik', Auth::guard('masyarakat')->user()->nik)->orderBy('created_at', 'desc')->paginate(5);

    return view('pengaduans.index', compact('pengaduansss'));
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
->with('success', 'Data Berhasil Disimpan!');


// $validated = $request->validate([
//     'nama_petugas' =>'required',
//     'username' => 'required',
//     'password' => 'required',
//     'telp' => 'required',
// ]);

// Petugas::create([
//     'nama_petugas' => $request->nama_petugas,
//     'username' => $request->username,
//     'password' => Hash::make($request->password),
//     'telp' => $request->telp,
// ]);

// return redirect()->route('usermanagement.index')->with('toast_success', 'Data Berhasil Disimpan!');

}

/**
* Display the specified resource.
*
* @param \App\Models\Pengaduans $pengaduans
* @return \Illuminate\Http\Response
*/
public function show($id)
{
    $pengaduansss = Pengaduans::findorFail($id);
    $nama = Masyarakat::where('nik', Auth::guard('masyarakat')->user()->nik)->first();
    return view('pengaduansss.show', compact('pengaduansss', 'nama'));
}

/**
* Show the form for editing the specified resource.
*
* @param \App\Models\Pengaduans $pengaduans
* @return \Illuminate\Http\Response
*/
public function edit(Pengaduans $pengaduansss)
{
return view('pengaduans.edit', compact('pengaduansss'));
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

$pengaduansss->update($validated);

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
