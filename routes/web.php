<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::post('/pegawai/proses', [App\Http\Controllers\PegawaiController::class, 'proses_upload'])->name('pegawai.proses');

Route::get('/pegawai', [App\Http\Controllers\PegawaiController::class, 'pegawai'])->name('pegawai.pegawai');
Route::get('/pegawai/cari', [App\Http\Controllers\PegawaiController::class, 'cari'])->name('pegawai.cari');
Route::get('/pegawai/tambah', [App\Http\Controllers\PegawaiController::class, 'tambah'])->name('pegawai.tambah');
Route::post('/pegawai/store', [App\Http\Controllers\PegawaiController::class, 'store'])->name('pegawai.store');
Route::get('/pegawai/edit/{id}', [App\Http\Controllers\PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::post('/pegawai/update/{id}', [App\Http\Controllers\PegawaiController::class, 'update'])->name('pegawai.update');
Route::get('/pegawai/hapus/{id}', [App\Http\Controllers\PegawaiController::class, 'hapus'])->name('pegawai.hapus');
Route::get('/pegawai/cetak_pdf', [App\Http\Controllers\PegawaiController::class, 'cetak_pdf'])->name('pegawai.cetak_pdf');

Route::get('/jabatan', [App\Http\Controllers\JabatanController::class, 'jabatan'])->name('jabatan.jabatan');
Route::get('/jabatan/cari', [App\Http\Controllers\JabatanController::class, 'cari'])->name('jabatan.cari');
Route::get('/jabatan/tambah', [App\Http\Controllers\JabatanController::class, 'tambah'])->name('jabatan.tambah');
Route::post('/jabatan/store', [App\Http\Controllers\JabatanController::class, 'store'])->name('jabatan.store');
Route::get('/jabatan/edit/{id}', [App\Http\Controllers\JabatanController::class, 'edit'])->name('jabatan.edit');
Route::post('/jabatan/update/{id}', [App\Http\Controllers\JabatanController::class, 'update'])->name('jabatan.update');
Route::get('/jabatan/hapus/{id}', [App\Http\Controllers\JabatanController::class, 'hapus'])->name('jabatan.hapus');

Route::get('/user', [App\Http\Controllers\UserController::class, 'user'])->name('user.user');
Route::get('/user/cari', [App\Http\Controllers\UserController::class, 'cari'])->name('user.cari');
Route::get('/user/tambah', [App\Http\Controllers\UserController::class, 'tambah'])->name('user.tambah');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/user/hapus/{id}', [App\Http\Controllers\UserController::class, 'hapus'])->name('user.hapus');


Route::get('/absensi', [App\Http\Controllers\AbsensiController::class, 'absensi'])->name('absensi.absensi');
Route::get('/absensi/cari', [App\Http\Controllers\AbsensiController::class, 'cari'])->name('absensi.cari');
Route::get('/absensi/tambah', [App\Http\Controllers\AbsensiController::class, 'tambah'])->name('absensi.tambah');
Route::post('/absensi/store', [App\Http\Controllers\AbsensiController::class, 'store'])->name('absensi.store');
Route::get('/absensi/edit/{id}', [App\Http\Controllers\AbsensiController::class, 'edit'])->name('absensi.edit');
Route::post('/absensi/update/{id}', [App\Http\Controllers\AbsensiController::class, 'update'])->name('absensi.update');
Route::get('/absensi/hapus/{id}', [App\Http\Controllers\AbsensiController::class, 'hapus'])->name('absensi.hapus');
Route::get('/absensi/cetak_pdf', [App\Http\Controllers\AbsensiController::class, 'cetak_pdf'])->name('absensi.cetak_pdf');


Route::get('/gaji', [App\Http\Controllers\GajiController::class, 'gaji'])->name('gaji.gaji');
Route::get('/gaji/cari', [App\Http\Controllers\GajiController::class, 'cari'])->name('gaji.cari');
Route::get('/gaji/tambah', [App\Http\Controllers\GajiController::class, 'tambah'])->name('gaji.tambah');
Route::post('/gaji/store', [App\Http\Controllers\GajiController::class, 'store'])->name('gaji.store');
Route::get('/gaji/edit/{id}', [App\Http\Controllers\GajiController::class, 'edit'])->name('gaji.edit');
Route::post('/gaji/update/{id}', [App\Http\Controllers\GajiController::class, 'update'])->name('gaji.update');
Route::get('/gaji/hapus/{id}', [App\Http\Controllers\GajiController::class, 'hapus'])->name('gaji.hapus');
Route::get('/gaji/cetak_pdf', [App\Http\Controllers\GajiController::class, 'cetak_pdf'])->name('gaji.cetak_pdf');
