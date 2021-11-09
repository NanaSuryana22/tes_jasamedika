<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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
Route::resource('halaman_utama', 'HalamanUtamaController');
Route::resource('pegawai', 'PegawaiController');
Route::resource('jabatan', 'JabatanController');
Route::resource('laporan_kinerja', 'KinerjaController');
Route::resource('tugas_jabatan', 'TugasJabatanController');

Route::get('/', function () {
    return Redirect::route('halaman_utama.index');
});
