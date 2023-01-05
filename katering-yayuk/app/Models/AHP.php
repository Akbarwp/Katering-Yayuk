<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AHP extends Model
{
    use HasFactory;

    protected $table = 'hasil_ahp';
    public $timestamps = false;

    function lihat()
    {
        $lihat = DB::table('hasil_ahp as ahp')
        ->join('alternatifs as alt', 'alt.id', '=', 'ahp.alternatif')
        ->select('alt.id_paket as alternatif', 'ahp.harga', 'ahp.jumlah_menu', 'ahp.popularitas', 'ahp.jumlah')
        ->get();
        return $lihat;
    }

    function lihatSorting()
    {
        $lihat = DB::table('hasil_ahp as ahp')
        ->join('alternatifs as alt', 'alt.id', '=', 'ahp.alternatif')
        ->select('alt.id_paket as alternatif', 'ahp.harga', 'ahp.jumlah_menu', 'ahp.popularitas', 'ahp.jumlah')
        ->orderBy('ahp.jumlah', 'asc')
        ->get();
        return $lihat;
    }

    function prioritas($tabel, $id)
    {
        $prioritas = DB::table($tabel)->where('id', $id)->get('prioritas');
        return $prioritas;
    }

    function hitung()
    {
        $alternatif = DB::table('alternatifs')->get();

        $harga = $this->prioritas('kriteria_prioritas', 'KP001');
        $jmlMenu = $this->prioritas('kriteria_prioritas', 'KP002');
        $popularitas = $this->prioritas('kriteria_prioritas', 'KP003');

        $hBaik = $this->prioritas('sub_kriteria_prioritas', 'SKP001');
        $hCukup = $this->prioritas('sub_kriteria_prioritas', 'SKP002');
        $hKurang = $this->prioritas('sub_kriteria_prioritas', 'SKP003');

        $jBaik = $this->prioritas('sub_kriteria_prioritas', 'SKP004');
        $jCukup = $this->prioritas('sub_kriteria_prioritas', 'SKP005');
        $jKurang = $this->prioritas('sub_kriteria_prioritas', 'SKP006');

        $pBaik = $this->prioritas('sub_kriteria_prioritas', 'SKP007');
        $pCukup = $this->prioritas('sub_kriteria_prioritas', 'SKP008');
        $pKurang = $this->prioritas('sub_kriteria_prioritas', 'SKP009');

        DB::table('hasil_ahp')->truncate();
        
        foreach ($alternatif as $alt) {
            $model = new AHP();
            $model->alternatif = $alt->id;

            foreach ($harga as $kri) {
                switch ($alt->harga) {
                    case 'Baik':
                        foreach ($hBaik as $sub) {
                            $model->harga = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Cukup':
                        foreach ($hCukup as $sub) {
                            $model->harga = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Kurang':
                        foreach ($hKurang as $sub) {
                            $model->harga = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                }
            }

            foreach ($jmlMenu as $kri) {
                switch ($alt->jumlah_menu) {
                    case 'Baik':
                        foreach ($jBaik as $sub) {
                            $model->jumlah_menu = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Cukup':
                        foreach ($jCukup as $sub) {
                            $model->jumlah_menu = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Kurang':
                        foreach ($jKurang as $sub) {
                            $model->jumlah_menu = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                }
            }

            foreach ($popularitas as $kri) {
                switch ($alt->popularitas) {
                    case 'Baik':
                        foreach ($pBaik as $sub) {
                            $model->popularitas = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Cukup':
                        foreach ($pCukup as $sub) {
                            $model->popularitas = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                    case 'Kurang':
                        foreach ($pKurang as $sub) {
                            $model->popularitas = round(($sub->prioritas * $kri->prioritas), 3);
                        }
                        break;
                }
            }
            $model->jumlah = round(($model->harga + $model->jumlah_menu + $model->popularitas), 3);
            $model->save();
        }
    }
}
