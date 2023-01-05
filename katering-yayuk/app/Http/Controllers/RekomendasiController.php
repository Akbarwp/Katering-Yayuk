<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    function index()
    {
        $model = new Rekomendasi();
        $rekom = $model->lihat();

        return view('dashboard.rekomendasi.index', [
            'title' => 'Rekomendasi',
            'rekomendasi' => $rekom,
        ]);
    }

    function tambahRekomendasi()
    {
        $model = new Paket();
        $paket = $model->lihat();

        return view('dashboard.rekomendasi.tambah', [
            'title' => 'Tambah Rekomendasi',
            'paket' => $paket,
        ]);
    }
    
    function masukkanRekomendasi(Request $request)
    {
        $model = new Rekomendasi();
        $model->tambah($request);

        return redirect('/dashboard/rekomendasi')->with('success', 'Rekomendasi berhasil ditambahkan');
    }

    function hapusRekomendasi(Request $request)
    {
        $model = new Rekomendasi();
        $model->hapus($request);

        return redirect('/dashboard/rekomendasi')->with('success', 'Rekomendasi berhasil dihapus');
    }
}
