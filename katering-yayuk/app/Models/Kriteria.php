<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model
{
    use HasFactory;

    function lihat()
    {
        $kriteria = DB::table('kriteria')->orderBy('id', 'asc')->get();
        return $kriteria;
    }

    function tambah($request)
    {
        $tambah = DB::table('kriteria')->insert([
            'id' => $request->id,
            'nama' => $request->nama
        ]);
        return $tambah;
    }

    function ubah($request)
    {
        $ubah = DB::table('kriteria')->where('id', $request->id)->get();
        return $ubah;
    }

    function perbarui($request)
    {
        $perbarui = DB::table('kriteria')->where('id', $request->id)->update([
            'nama' => $request->nama
        ]);
        return $perbarui;
    }

    function hapus($request)
    {
        $hapus = DB::table('kriteria')->where('id', $request->id)->delete();
        return $hapus;
    }

    function hitungKriteria()
    {
        $hitungKriteria = DB::table('kriteria')->count('id');
        return $hitungKriteria;
    }

    function lihatSubKriteria()
    {
        $hitungKriteria = DB::table('sub_kriteria')->orderBy('id', 'asc')->get();
        return $hitungKriteria;
    }
}
