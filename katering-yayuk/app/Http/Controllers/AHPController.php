<?php

namespace App\Http\Controllers;

use App\Models\AHP;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class AHPController extends Controller
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

        $model3 = new AHP();
        $ahp = $model3->lihat();

        return view('dashboard.ahp.index', [
            'title' => 'AHP',
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
            'namaKriteria' => $namaKriteria,
            'hasil_ahp' => $ahp,
        ]);
    }

    function hitungAHP()
    {
        $model = new AHP();
        $model->hitung();

        return redirect('/dashboard/ahp')->with('success', 'AHP berhasil Dihitung');
    }

    function sorting()
    {
        $model1 = new Alternatif();
        $alternatif = $model1->lihat();

        $model2 = new Kriteria();
        $kriteria = $model2->lihat();

        foreach ($kriteria as $kri) {
            $namaKriteria[] = str_replace(" ", "_", strtolower($kri->nama));
        }

        $model3 = new AHP();
        $ahp = $model3->lihatSorting();

        return view('dashboard.ahp.index', [
            'title' => 'AHP',
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
            'namaKriteria' => $namaKriteria,
            'hasil_ahp' => $ahp,
        ]);
    }
}
