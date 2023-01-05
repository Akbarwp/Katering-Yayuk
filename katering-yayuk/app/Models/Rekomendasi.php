<?php

namespace App\Models;

use App\Models\AHP;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekomendasi extends Model
{
    use HasFactory;

    function lihat()
    {
        $lihat = DB::table('rekomendasi as rkm')
        ->join('paket as pkt', 'pkt.id', '=', 'rkm.paket')
        ->join('isi_paket as isi', 'isi.id', '=', 'pkt.id')
        ->select('rkm.id as rkmID', 'pkt.id as pktID', 'pkt.nama', 'isi.nasi', 'isi.lauk_utama', 'isi.lauk_pendamping1', 'isi.lauk_pendamping2', 'pkt.harga', 'rkm.nilai')
        ->get();

        return $lihat;
    }

    function tambah($request)
    {
        $model = DB::table('hasil_ahp as ahp')
        ->join('alternatifs as alt', 'alt.id', '=', 'ahp.alternatif')
        ->where('alt.id_paket', $request->paket)->get('jumlah');

        foreach ($model as $nl) {
            $nilai[] = $nl->jumlah;
        }

        $tambah = DB::table('rekomendasi')->insert([
            'id' => $request->id,
            'paket' => $request->paket,
            'nilai' => $nilai[0]
        ]);
        return $tambah;
    }

    function hapus($request)
    {
        $hapus = DB::table('rekomendasi')->where('id', $request->id)->delete();
        return $hapus;
    }
}
