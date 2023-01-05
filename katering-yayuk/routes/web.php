<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AHPController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\PerbandinganController;

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
    return view('home', [
        'title' => 'Home'
    ]);
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/menu', [MenuController::class, 'daftar_menu']);

Route::get('/dashboard', function() {
    return view('dashboard.index', [
        'title' => 'Home'
    ]);
});

// Menu
Route::get('/dashboard/menu', [MenuController::class, 'dashboard_menu']);

Route::get('/dashboard/{menu}/tambah', [MenuController::class, 'tambahMenu']);
Route::post('/dashboard/{menu}/tambah', [MenuController::class, 'masukkanMenu']);

Route::get('/dashboard/{menu}/ubah/{id}', [MenuController::class, 'ubahMenu']);
Route::post('/dashboard/{menu}/ubah/{id}', [MenuController::class, 'perbaruiMenu']);

Route::get('/dashboard/{menu}/hapus/{id}', [MenuController::class, 'hapusMenu']);


// Paket
Route::get('/dashboard/paket', [PaketController::class, 'index']);

Route::get('/dashboard/paket/tambahh', [PaketController::class, 'tambahPaket']);
Route::post('/dashboard/paket/tambahh', [PaketController::class, 'masukkanPaket']);

Route::get('/dashboard/paket/ubahh/{id}', [PaketController::class, 'ubahPaket']);
Route::post('/dashboard/paket/ubahh/{id}', [PaketController::class, 'perbaruiPaket']);

Route::get('/dashboard/paket/hapuss/{id}', [PaketController::class, 'hapusPaket']);


// Rekomendasi
Route::get('/dashboard/rekomendasi', [RekomendasiController::class, 'index']);

Route::get('/dashboard/rekomendasi/tambahh', [RekomendasiController::class, 'tambahRekomendasi']);
Route::post('/dashboard/rekomendasi/tambahh', [RekomendasiController::class, 'masukkanRekomendasi']);

Route::get('/dashboard/rekomendasi/hapuss/{id}', [RekomendasiController::class, 'hapusRekomendasi']);


// Kriteria
Route::get('/dashboard/kriteria', [KriteriaController::class, 'index']);

Route::get('/dashboard/kriteria/tambahh', [KriteriaController::class, 'tambahKriteria']);
Route::post('/dashboard/kriteria/tambahh', [KriteriaController::class, 'masukkanKriteria']);

Route::get('/dashboard/kriteria/ubahh/{id}', [KriteriaController::class, 'ubahKriteria']);
Route::post('/dashboard/kriteria/ubahh/{id}', [KriteriaController::class, 'perbaruiKriteria']);

Route::get('/dashboard/kriteria/hapuss/{id}', [KriteriaController::class, 'hapusKriteria']);


// Sub Kriteria
Route::get('/dashboard/subkriteria', [SubKriteriaController::class, 'index']);

Route::get('/dashboard/subkriteria/tambahh', [SubKriteriaController::class, 'tambahSubKriteria']);
Route::post('/dashboard/subkriteria/tambahh', [SubKriteriaController::class, 'masukkanSubKriteria']);

Route::get('/dashboard/subkriteria/ubahh/{id}', [SubKriteriaController::class, 'ubahSubKriteria']);
Route::post('/dashboard/subkriteria/ubahh/{id}', [SubKriteriaController::class, 'perbaruiSubKriteria']);

Route::get('/dashboard/subkriteria/hapuss/{id}', [SubKriteriaController::class, 'hapusSubKriteria']);


// Alternatif
Route::get('/dashboard/alternatif', [AlternatifController::class, 'index']);

Route::get('/dashboard/alternatif/tambahh', [AlternatifController::class, 'tambahAlternatif']);
Route::post('/dashboard/alternatif/tambahh', [AlternatifController::class, 'masukkanAlternatif']);

Route::get('/dashboard/alternatif/ubahh/{id}', [AlternatifController::class, 'ubahAlternatif']);
Route::post('/dashboard/alternatif/ubahh/{id}', [AlternatifController::class, 'perbaruiAlternatif']);

Route::get('/dashboard/alternatif/hapuss/{id}', [AlternatifController::class, 'hapusAlternatif']);


// Perbandingan
Route::get('/dashboard/perbandingan', [PerbandinganController::class, 'index']);
Route::get('/dashboard/perbandingan/ubahh', [PerbandinganController::class, 'ubahh']);
Route::post('/dashboard/perbandingan/ubahh', [PerbandinganController::class, 'update']);
Route::get('/dashboard/perbandingan/matriksNilai', [PerbandinganController::class, 'matriksNilai']);

Route::get('/dashboard/perbandingan/subKriteria', [PerbandinganController::class, 'subKriteria']);
Route::get('/dashboard/perbandingan/subKriteria/ubahh/{kriteria}', [PerbandinganController::class, 'ubahSub']);
Route::post('/dashboard/perbandingan/subKriteria/ubahh/{kriteria}', [PerbandinganController::class, 'updateSub']);
Route::get('/dashboard/perbandingan/matriksNilai/{kriteria}', [PerbandinganController::class, 'matriksNilaiSubKriteria']);


// AHP
Route::get('/dashboard/ahp', [AHPController::class, 'index']);
Route::get('/dashboard/ahp/sorting', [AHPController::class, 'sorting']);
Route::get('/dashboard/ahp/hitung', [AHPController::class, 'hitungAHP']);


// Pesanan
Route::get('/pesanan', [PesananController::class, 'index']);
Route::get('/pesanan/rekomendasi', [PesananController::class, 'rekomendasi']);
Route::post('/pesanan/rekomendasi', [PesananController::class, 'perhitungan']);

Route::get('/pesanan/paket', [PesananController::class, 'paket']);

// Route::get('/pesanan/rekomendasi/hasil', [PesananController::class, 'rekomendasi']);