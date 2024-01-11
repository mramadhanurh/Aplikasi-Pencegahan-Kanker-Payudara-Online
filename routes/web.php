<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UsiaController;
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
    return view('welcome');
});

Route::get('/konsultasi', function () {
    return view('konsultasi');
});

// Route::get('/', function () {
//     return view('v_home');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', function () {
    \Auth::logout();
    return redirect('/');
});

// Route Usia
Route::get('usia', [UsiaController::class, 'index']);
Route::get('fetch-usia', [UsiaController::class, 'fetchusia']);
Route::post('usia', [UsiaController::class, 'store']);
Route::get('edit-usia/{id}', [UsiaController::class, 'edit']);
Route::put('update-usia/{id}', [UsiaController::class, 'update']);
Route::delete('delete-usia/{id}', [UsiaController::class, 'destroy']);

// Route Riwayat
Route::get('riwayat', [RiwayatController::class, 'index']);
Route::get('fetch-riwayat', [RiwayatController::class, 'fetchriwayat']);
Route::post('riwayat', [RiwayatController::class, 'store']);
Route::get('edit-riwayat/{id}', [RiwayatController::class, 'edit']);
Route::put('update-riwayat/{id}', [RiwayatController::class, 'update']);
Route::delete('delete-riwayat/{id}', [RiwayatController::class, 'destroy']);

// Route Kategori
Route::get('kategori', [KategoriController::class, 'index']);
Route::get('fetch-kategori', [KategoriController::class, 'fetchkategori']);
Route::post('kategori', [KategoriController::class, 'store']);
Route::get('edit-kategori/{id}', [KategoriController::class, 'edit']);
Route::put('update-kategori/{id}', [KategoriController::class, 'update']);
Route::delete('delete-kategori/{id}', [KategoriController::class, 'destroy']);

// Route Pertanyaan
Route::get('pertanyaan', [PertanyaanController::class, 'index']);
Route::get('fetch-pertanyaan', [PertanyaanController::class, 'fetchpertanyaan']);
Route::post('pertanyaan', [PertanyaanController::class, 'store']);
Route::get('edit-pertanyaan/{id}', [PertanyaanController::class, 'edit']);
Route::put('update-pertanyaan/{id}', [PertanyaanController::class, 'update']);
Route::delete('delete-pertanyaan/{id}', [PertanyaanController::class, 'destroy']);

