<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paket extends Model
{
    use HasFactory;

    function lihat()
    {
        $paket = DB::table('paket')
        ->join('isi_paket', 'isi_paket.id', '=', 'paket.id')
        ->orderBy('paket.id', 'asc')
        ->get();
        return $paket;
    }

    function tambah($tabel)
    {
        $tambah = DB::table($tabel)->get();
        return $tambah;
    }

    function masukkan($kode, $request)
    {
        if ($kode == 'paket')
        {
            $paket = DB::table('paket')->insert([
                'id' => $request->id,
                'nama' => $request->nama,
                'harga' => '25000',
            ]);
            return $paket;

        } else if ($kode == 'isi_paket')
        {
            $isiPaket = DB::table('isi_paket')->insert([
                'id' => $request->id,
                'nasi' => $request->nasi,
                'lauk_utama' => $request->lauk_utama,
                'lauk_pendamping1' => $request->lauk_pendamping1,
                'lauk_pendamping2' => $request->lauk_pendamping2,
            ]);
            return $isiPaket;
        }
    }

    function ubah($request)
    {
        $ubah = DB::table('paket')
        ->join('isi_paket', 'isi_paket.id', '=', 'paket.id')
        ->where('paket.id', $request->id)
        ->get();

        return $ubah;
    }

    function perbarui($kode, $request)
    {
        if ($kode == 'paket')
        {
            $paket = DB::table('paket')->where('id', $request->id)->update([
                'nama' => $request->nama,
                'harga' => '25000',
            ]);
            return $paket;

        } else if ($kode == 'isi_paket')
        {
            $isiPaket = DB::table('isi_paket')->where('id', $request->id)->update([
                'nasi' => $request->nasi,
                'lauk_utama' => $request->lauk_utama,
                'lauk_pendamping1' => $request->lauk_pendamping1,
                'lauk_pendamping2' => $request->lauk_pendamping2,
            ]);
            return $isiPaket;
        }
    }

    function hapus($request)
    {
        $hapusPaket = DB::table('paket')->where('id', $request->id)->delete();
        $hapusIsiPaket = DB::table('isi_paket')->where('id', $request->id)->delete();

        return [$hapusPaket, $hapusIsiPaket];
    }
}
