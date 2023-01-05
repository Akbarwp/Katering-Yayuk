<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    function lihat($tabel)
    {
        $menu = DB::table($tabel)->orderBy('id', 'asc')->get();
        return $menu;
    }

    function tambah($tabel, $request)
    {
        $tambah = DB::table($tabel)->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'harga' => $request->harga
        ]);
        return $tambah;
    }

    function ubah($tabel, $request)
    {
        $ubah = DB::table($tabel)->where('id', $request->id)->get();
        return $ubah;
    }

    function perbarui($tabel, $request)
    {
        $perbarui = DB::table($tabel)->where('id', $request->id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga
        ]);
        return $perbarui;
    }

    function hapus($tabel, $request)
    {
        $hapus = DB::table($tabel)->where('id', $request->id)->delete();
        return $hapus;
    }
}
