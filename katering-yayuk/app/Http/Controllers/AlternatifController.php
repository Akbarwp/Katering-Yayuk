<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    function index()
    {
        $model1 = new Alternatif();
        $alternatif = $model1->lihat();

        $model2 = new Kriteria();
        $kriteria = $model2->lihat();

        foreach ($kriteria as $kri) {
            $namaKriteria[] = str_replace(" ", "_", strtolower($kri->nama));
        }

        return view('dashboard.alternatif.index', [
            'title' => 'Alternatif',
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
            'namaKriteria' => $namaKriteria,
        ]);
    }

    function tambahAlternatif()
    {
        $model = new Alternatif();
        $paket = $model->tambah('paket');
        $kriteria = $model->tambah('kriteria');
        $subKriteria = $model->tambah('sub_kriteria');
        $alternatif = $model->tambah('alternatifs');
        
        return view('dashboard.alternatif.tambah', [
            'title' => 'Tambah Alternatif',
            'paket' => $paket,
            'kriteria' => $kriteria,
            'subKriteria' => $subKriteria,
            'alternatif' => $alternatif,
        ]);
    }

    function masukkanAlternatif(Request $request)
    {
        $model = new Alternatif();
        $model->masukkan($request);

        return redirect('/dashboard/alternatif')->with('success', 'Alternatif berhasil ditambahkan');
    }

    function ubahAlternatif(Request $request)
    {
        $model = new Alternatif();

        $paket = $model->tambah('paket');
        $kriteria = $model->tambah('kriteria');
        $subKriteria = $model->tambah('sub_kriteria');
        $alternatif = $model->ubah($request);

        return view('dashboard.alternatif.ubah', [
            'title' => 'Ubah Alternatif',
            'paket' => $paket,
            'kriteria' => $kriteria,
            'subKriteria' => $subKriteria,
            'alternatif' => $alternatif,
        ]);
    }

    function perbaruiAlternatif(Request $request)
    {
        $model = new Alternatif();
        $model->perbarui($request);

        return redirect('/dashboard/alternatif')->with('success', 'Alternatif berhasil diperbarui');
    }

    function hapusAlternatif(Request $request)
    {
        $model = new Alternatif();
        $model->hapus($request);

        return redirect('/dashboard/alternatif')->with('success', 'Alternatif berhasil dihapus');
    }
}
