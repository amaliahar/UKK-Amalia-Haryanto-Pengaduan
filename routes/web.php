<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\LaporanController;


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



Route::get('user', function () {
    return view('user.index');
});

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
// Route::resource('/laporan', LaporanController::class);

// Route::get('register', function (){
//     return view('user.register');
// });

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('tanggapan', TanggapanController::class);
