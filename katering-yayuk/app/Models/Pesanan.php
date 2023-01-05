<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    function prioritas($tabel)
    {
        $prioritas = DB::table($tabel)->where('id_kriteria')->get();

        return $prioritas;
    }

    function rekomendasi($hasil)
    {
        $rekomendasi = DB::table('hasil_ahp as ahp')
        ->join('alternatifs as alt', 'alt.id', '=', 'ahp.alternatif')
        ->join('paket as pkt', 'pkt.id', '=', 'alt.id_paket')
        ->join('isi_paket as isi', 'isi.id', '=', 'pkt.id')
        ->select('pkt.nama', 'isi.nasi', 'isi.lauk_utama', 'isi.lauk_pendamping1', 'isi.lauk_pendamping2', 'pkt.harga', 'ahp.jumlah')
        ->where('jumlah', '<=', $hasil)
        ->orderBy('jumlah', 'desc')
        ->get();

        return $rekomendasi;
    }
}
