<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternatif extends Model
{
    use HasFactory;

    public $timestamps = false;

    function lihat()
    {
        $alternatif = DB::table('alternatifs')->orderBy('id', 'asc')->get();
        return $alternatif;
    }

    function tambah($tabel)
    {
        $tambah = DB::table($tabel)->get();
        return $tambah;
    }

    function masukkan($request)
    {
        $model = new Alternatif();
        
        $model2 = new Kriteria();
        $kriteria = $model2->lihat();

        $model->id = $request->id;
        $model->id_paket = $request->id_paket;
        foreach ($kriteria as $kri) {
            $namaKriteria = str_replace(" ", "_", strtolower($kri->nama));
            
            $model->$namaKriteria = $request->$namaKriteria;
        }
        $model->save();
    }

    function ubah($request)
    {
        $ubah = DB::table('alternatifs')->where('id', $request->id)->get();
        return $ubah;
    }

    function perbarui($request)
    {
        $model = new Alternatif();
        
        $model2 = new Kriteria();
        $kriteria = $model2->lihat();

        // $model->find($request->id);
        // $alt[] = $model->id = $request->id;
        $alt['paket'] = $model->paket = $request->paket;
        foreach ($kriteria as $kri) {
            $namaKriteria = str_replace(" ", "_", strtolower($kri->nama));
            
            $model->$namaKriteria = $request->$namaKriteria;
            $alt[$namaKriteria] = $model->$namaKriteria;
        }
        $model->where('id', $request->id)->update($alt);
    }

    function hapus($request)
    {
        $hapus = DB::table('alternatifs')->where('id', $request->id)->delete();

        return $hapus;
    }

    function kolom($nama, $fungsi, $satuan = ' ', $namaBaru = ' ')
    {
        $kolom = DB::statement("ALTER TABLE alternatif $fungsi $nama $namaBaru $satuan");
        return $kolom;
    }
}
