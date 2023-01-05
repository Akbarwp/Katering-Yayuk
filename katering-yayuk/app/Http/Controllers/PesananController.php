<?php

namespace App\Http\Controllers;

use App\Models\AHP;
use App\Models\Pesanan;
use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Rekomendasi;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    function index()
    {
        return view('pesanan.index', [
            'title' => 'Pesanan',
        ]);
    }

    function paket()
    {
        $model = new Rekomendasi();
        $rekomendasi = $model->lihat();
        
        return view('pesanan.paket', [
            'title' => 'Rekomendasi Paket',
            'rekomendasi' => $rekomendasi,
        ]);
    }

    function rekomendasi()
    {

        $kri = new Kriteria();
        $kriteria = $kri->lihat();

        $sk = new SubKriteria();
        $subKriteria = $sk->lihat();

        return view('pesanan.rekomendasi', [
            'title' => 'Rekomendasi',
            'kriteria' => $kriteria,
            'subKriteria' => $subKriteria,
        ]);
    }

    function perhitungan(Request $request)
    {
        $pesan = new Pesanan();
        $alt = new Alternatif();
        $alternatif = $alt->lihat();
        $ahp = new AHP();

        $harga = $ahp->prioritas('kriteria_prioritas', 'KP001');
        $jmlMenu = $ahp->prioritas('kriteria_prioritas', 'KP002');
        $popularitas = $ahp->prioritas('kriteria_prioritas', 'KP003');

        $hBaik = $ahp->prioritas('sub_kriteria_prioritas', 'SKP001');
        $hCukup = $ahp->prioritas('sub_kriteria_prioritas', 'SKP002');
        $hKurang = $ahp->prioritas('sub_kriteria_prioritas', 'SKP003');

        $jBaik = $ahp->prioritas('sub_kriteria_prioritas', 'SKP004');
        $jCukup = $ahp->prioritas('sub_kriteria_prioritas', 'SKP005');
        $jKurang = $ahp->prioritas('sub_kriteria_prioritas', 'SKP006');

        $pBaik = $ahp->prioritas('sub_kriteria_prioritas', 'SKP007');
        $pCukup = $ahp->prioritas('sub_kriteria_prioritas', 'SKP008');
        $pKurang = $ahp->prioritas('sub_kriteria_prioritas', 'SKP009');
        
        foreach ($alternatif as $alt) {
            foreach ($harga as $kri) {
                switch ($request->harga) {
                    case 'Baik':
                        foreach ($hBaik as $sub) {
                            $hrg = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Cukup':
                        foreach ($hCukup as $sub) {
                            $hrg = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Kurang':
                        foreach ($hKurang as $sub) {
                            $hrg = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                }
            }

            foreach ($jmlMenu as $kri) {
                switch ($request->jumlah_menu) {
                    case 'Baik':
                        foreach ($jBaik as $sub) {
                            $jml = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Cukup':
                        foreach ($jCukup as $sub) {
                            $jml = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Kurang':
                        foreach ($jKurang as $sub) {
                            $jml = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                }
            }

            foreach ($popularitas as $kri) {
                switch ($request->popularitas) {
                    case 'Baik':
                        foreach ($pBaik as $sub) {
                            $popu = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Cukup':
                        foreach ($pCukup as $sub) {
                            $popu = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Kurang':
                        foreach ($pKurang as $sub) {
                            $popu = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                }
            }
            $hasil = round(($hrg + $jml + $popu + 0.001), 3);
        }

        $hasilRekomendasi = $pesan->rekomendasi($hasil);

        return view('pesanan.hasilRekomendasi', [
            'title' => 'Hasil Rekomendasi',
            'hasil' => $hasilRekomendasi,
            'hasill' => $hasil
        ]);
    }
}
