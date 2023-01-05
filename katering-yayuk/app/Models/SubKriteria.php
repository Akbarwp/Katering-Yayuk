<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKriteria extends Model
{
    use HasFactory;

    function lihat()
    {
        $subKriteria = DB::table('sub_kriteria')->orderBy('id', 'asc')->get();
        return $subKriteria;
    }

    function tambah($request)
    {
        $tambah = DB::table('sub_kriteria')->insert([
            'id' => $request->id,
            'nama' => $request->nama
        ]);
        return $tambah;
    }

    function ubah($request)
    {
        $ubah = DB::table('sub_kriteria')->where('id', $request->id)->get();
        return $ubah;
    }

    function perbarui($request)
    {
        $perbarui = DB::table('sub_kriteria')->where('id', $request->id)->update([
            'nama' => $request->nama
        ]);
        return $perbarui;
    }

    function hapus($request)
    {
        $hapus = DB::table('sub_kriteria')->where('id', $request->id)->delete();
        return $hapus;
    }
}
