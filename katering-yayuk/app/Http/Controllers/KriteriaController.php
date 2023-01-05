<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    function index()
    {
        $model = new Kriteria();
        $kriteria = $model->lihat();

        return view('dashboard.kriteria.index', [
            'title' => 'Kriteria',
            'kriteria' => $kriteria,
        ]);
    }

    function tambahKriteria()
    {
        return view('dashboard.kriteria.tambah', [
            'title' => 'Tambah Kriteria',
        ]);
    }

    function masukkanKriteria(Request $request)
    {
        $model = new Kriteria();
        $model->tambah($request);

        $nama = str_replace(" ", "_", strtolower($request->nama));

        $alternatif = new Alternatif();
        $alternatif->kolom($nama, 'ADD', 'VARCHAR(100)');

        return redirect('/dashboard/kriteria')->with('success', 'Kriteria berhasil ditambahkan');
    }

    function ubahKriteria(Request $request)
    {
        $model = new Kriteria();
        $kriteria = $model->ubah($request);

        return view('dashboard.kriteria.ubah', [
            'title' => 'Ubah Kriteria',
            'kriteria' => $kriteria
        ]);
    }

    function perbaruiKriteria(Request $request)
    {
        $model = new Kriteria();
        
        $namaBaru = str_replace(" ", "_", strtolower($request->nama));
        $kriteria = $model->ubah($request);
        foreach ($kriteria as $kri) {
            $nama = str_replace(" ", "_", strtolower($kri->nama));
        }

        $alternatif = new Alternatif();
        $alternatif->kolom($nama, 'CHANGE', 'VARCHAR(100)', $namaBaru);
        
        $model->perbarui($request);

        return redirect('/dashboard/kriteria')->with('success', 'Kriteria berhasil diperbarui');
    }

    function hapusKriteria(Request $request)
    {
        $model = new Kriteria();

        $kriteria = $model->ubah($request);
        foreach ($kriteria as $kri) {
            $nama = str_replace(" ", "_", strtolower($kri->nama));
        }

        $alternatif = new Alternatif();
        $alternatif->kolom($nama, 'DROP');

        $model->hapus($request);

        return redirect('/dashboard/kriteria')->with('success', 'Kriteria berhasil dihapus');
    }
}
