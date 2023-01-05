<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    function index()
    {
        $model = new SubKriteria();
        $subKriteria = $model->lihat();

        return view('dashboard.sub_kriteria.index', [
            'title' => 'Sub Kriteria',
            'subKriteria' => $subKriteria,
        ]);
    }

    function tambahSubKriteria()
    {
        return view('dashboard.sub_kriteria.tambah', [
            'title' => 'Tambah Sub Kriteria',
        ]);
    }

    function masukkanSubKriteria(Request $request)
    {
        $model = new SubKriteria();
        $model->tambah($request);

        return redirect('/dashboard/subkriteria')->with('success', 'Sub Kriteria berhasil ditambahkan');
    }

    function ubahSubKriteria(Request $request)
    {
        $model = new SubKriteria();
        $subKriteria = $model->ubah($request);

        return view('dashboard.sub_kriteria.ubah', [
            'title' => 'Ubah Kriteria',
            'subKriteria' => $subKriteria
        ]);
    }

    function perbaruiSubKriteria(Request $request)
    {
        $model = new SubKriteria();
        $model->perbarui($request);

        return redirect('/dashboard/subkriteria')->with('success', 'Sub Kriteria berhasil diperbarui');
    }

    function hapusSubKriteria(Request $request)
    {
        $model = new SubKriteria();
        $model->hapus($request);

        return redirect('/dashboard/subkriteria')->with('success', 'Sub Kriteria berhasil dihapus');
    }
}
