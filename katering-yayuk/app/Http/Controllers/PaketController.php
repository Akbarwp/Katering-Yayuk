<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    function index()
    {
        $model = new Paket();
        $paket = $model->lihat();

        return view('dashboard.paket.index', [
            'title' => 'Paket',
            'paket' => $paket,
        ]);
    }

    function tambahPaket()
    {
        $model = new Paket();
        $nasi = $model->tambah('nasi');
        $lauk_utama = $model->tambah('lauk_utama');
        $lauk_pendamping = $model->tambah('lauk_pendamping');
        
        return view('dashboard.paket.tambah', [
            'title' => 'Tambah Paket',
            'nasi' => $nasi,
            'lauk_utama' => $lauk_utama,
            'lauk_pendamping' => $lauk_pendamping,
        ]);
    }

    function masukkanPaket(Request $request)
    {
        $model = new Paket();
        $model->masukkan('paket', $request);
        $model->masukkan('isi_paket', $request);

        return redirect('/dashboard/paket')->with('success', 'Paket berhasil ditambahkan');
    }

    function ubahPaket(Request $request)
    {
        $model = new Paket();
        $paket = $model->ubah($request);

        $nasi = $model->tambah('nasi');
        $lauk_utama = $model->tambah('lauk_utama');
        $lauk_pendamping = $model->tambah('lauk_pendamping');

        return view('dashboard.paket.ubah', [
            'title' => 'Ubah Paket',
            'paket' => $paket,
            'nasi' => $nasi,
            'lauk_utama' => $lauk_utama,
            'lauk_pendamping' => $lauk_pendamping,
        ]);
    }

    function perbaruiPaket(Request $request)
    {
        $model = new Paket();
        $model->perbarui('paket', $request);
        $model->perbarui('isi_paket', $request);

        return redirect('/dashboard/paket')->with('success', 'Paket berhasil diperbarui');
    }

    function hapusPaket(Request $request)
    {
        $model = new Paket();
        $model->hapus($request);

        return redirect('/dashboard/paket')->with('success', 'Paket berhasil dihapus');
    }
}
