<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PengaduansController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});


Route::get('pengaduan-proses', [DashboardController::class, 'showProses'])->name('proses');
Route::get('pengaduan-selesai', [DashboardController::class, 'showSelesai'])->name('selesai');



// Route::get('user', function () {
//     return view('user.index');
// });
Route::get('user', [UsersController::class, 'index']);


// User
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authentication'])->name('authentication');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::resource('pengaduan', PengaduanController::class)->middleware('auth');
Route::resource('pengaduan', PengaduanController::class)->middleware('auth');

Route::get('home', function (){
    return view('home');
});

Route::get('laporan', function (){
    return view('laporan');
});

// Route::get('laporan',array('as'=>'laporan','uses'=>'LaporanController@store'));

// Route::resource('/laporan', LaporanController::class);

// Route::get('register', function (){
//     return view('user.register');
// });

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('tanggapan', TanggapanController::class);


Route::get('export', function (){
    return view('export');
});


// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('masyarakat', [MasyarakatController::class, 'index'])->name('masyarakat.index');

// Route::get('petugas', [PetugasController::class, 'index'])->name('petugas.index');
// Route::get('/tambahpetugas', [PetugasController::class, 'create'])->name('petugas.create');
// Route::post('/tambahpetugas', [PetugasController::class, 'store'])->name('petugas.store');
// Route::get('/petugas/edit/{$id_petugas}', [PetugasController::class, 'edit'])->name('petugas.edit');
// Route::put('/petugas/edit/{$id_petugas}', [PetugasController::class, 'update'])->name('petugas.update');
// Route::delete('/petugas/edit/{$id_petugas}', [PetugasController::class, 'delete'])->name('petugas.delete');

// Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');

// Route::get('tanggapan', [TanggapanController::class, 'index'])->name('tanggapan.index');
// Route::get('/tambahtanggapan', [TanggapanController::class, 'create'])->name('tanggapan.create');
// Route::post('/tambahtanggapan', [TanggapanController::class, 'store'])->name('tanggapan.store');
// Route::get('/tambahtanggapan/edit/{$id_tanggapan}', [TanggapanController::class, 'edit'])->name('tanggapan.edit');
// Route::put('/tanggapan/edit/{$id_tanggapan}', [TanggapanController::class, 'update'])->name('tanggapan.update');
// Route::delete('/tanggapan/edit/{$id_tanggapan}', [TanggapanController::class, 'delete'])->name('tanggapan.delete');

Route::get('pengaduans', [PengaduansController::class, 'index'])->name('pengaduans.index');
Route::post('pengaduans', [PengaduansController::class, 'store'])->name('pengaduans.store');
