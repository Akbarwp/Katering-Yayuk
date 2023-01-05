<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    function daftar_menu()
    {
        $model = new Menu();
        $nasi = $model->lihat('nasi');
        $lauk_utama = $model->lihat('lauk_utama');
        $lauk_pendamping = $model->lihat('lauk_pendamping');

        return view('menu', [
            'title' => 'Menu',
            'nasi' =>$nasi,
            'lauk_utama' =>$lauk_utama,
            'lauk_pendamping' =>$lauk_pendamping
        ]);
    }

    function dashboard_menu()
    {
        $model = new Menu();
        $nasi = $model->lihat('nasi');
        $lauk_utama = $model->lihat('lauk_utama');
        $lauk_pendamping = $model->lihat('lauk_pendamping');

        return view('dashboard.menu.index', [
            'title' => 'Menu',
            'nasi' =>$nasi,
            'lauk_utama' =>$lauk_utama,
            'lauk_pendamping' =>$lauk_pendamping
        ]);
    }

    function tambahMenu(Request $request)
    {
        if ($request->menu == 'nasi')
        {
            return view('dashboard.menu.tambah', [
                'title' => 'Tambah Nasi',
                'h1' => 'Nasi',
                'kode' => 'nasi'
            ]);

        } else if ($request->menu == 'lauk_utama')
        {
            return view('dashboard.menu.tambah', [
                'title' => 'Tambah Lauk Utama',
                'h1' => 'Lauk Utama',
                'kode' => 'lauk_utama'
            ]);

        } else if ($request->menu == 'lauk_pendamping')
        {
            return view('dashboard.menu.tambah', [
                'title' => 'Tambah Lauk Pendamping',
                'h1' => 'Lauk Pendamping',
                'kode' => 'lauk_pendamping'
            ]);

        } else {
            abort(404);
        }
    }

    function masukkanMenu(Request $request)
    {
        $model = new Menu();
        
        if ($request->kode == 'nasi')
        {
            $model->tambah('nasi', $request);
            return redirect('/dashboard/menu')->with('success', 'Nasi berhasil ditambahkan');

        } else if ($request->kode == 'lauk_utama')
        {
            $model->tambah('lauk_utama', $request);
            return redirect('/dashboard/menu')->with('success', 'Lauk Utama berhasil ditambahkan');

        } else if ($request->kode == 'lauk_pendamping')
        {
            $model->tambah('lauk_pendamping', $request);
            return redirect('/dashboard/menu')->with('success', 'Lauk Pendamping berhasil ditambahkan');
        }
    }

    function ubahMenu(Request $request)
    {
        $model = new Menu();
        
        if ($request->menu == 'nasi')
        {
            $nasi = $model->ubah('nasi', $request);
                return view('dashboard.menu.ubah', [
                    'title' => 'Ubah Nasi',
                    'nasi' => $nasi,
                    'h1' => 'Nasi',
                    'kode' => 'nasi'
                ]);

        } else if ($request->menu == 'lauk_utama')
        {
            $lauk_utama = $model->ubah('lauk_utama', $request);
                return view('dashboard.menu.ubah', [
                    'title' => 'Ubah Lauk Utama',
                    'lauk_utama' => $lauk_utama,
                    'h1' => 'Lauk Utama',
                    'kode' => 'lauk_utama'
                ]);

        } else if ($request->menu == 'lauk_pendamping')
        {
            $lauk_pendamping = $model->ubah('lauk_pendamping', $request);
                return view('dashboard.menu.ubah', [
                    'title' => 'Ubah Lauk Pendamping',
                    'lauk_pendamping' => $lauk_pendamping,
                    'h1' => 'Lauk Pendamping',
                    'kode' => 'lauk_pendamping'
                ]);
        }
    }

    function perbaruiMenu(Request $request)
    {
        $model = new Menu();
        
        if ($request->kode == 'nasi')
        {
            $model->perbarui('nasi', $request);
            return redirect('/dashboard/menu')->with('success', 'Nasi berhasil diperbarui');

        } else if ($request->kode == 'lauk_utama')
        {
            $model->perbarui('lauk_utama', $request);
            return redirect('/dashboard/menu')->with('success', 'Lauk Utama berhasil diperbarui');

        } else if ($request->kode == 'lauk_pendamping')
        {
            $model->perbarui('lauk_pendamping', $request);
            return redirect('/dashboard/menu')->with('success', 'Lauk Pendamping berhasil diperbarui');
        }
    }

    function hapusMenu(Request $request)
    {
        $model = new Menu();

        if ($request->menu == 'nasi')
        {
            $model->hapus('nasi', $request);
            return redirect('/dashboard/menu')->with('success', 'Nasi berhasil dihapus');

        } else if ($request->menu == 'lauk_utama')
        {
            $model->hapus('lauk_utama', $request);
            return redirect('/dashboard/menu')->with('success', 'Lauk Utama berhasil dihapus');

        } else if ($request->menu == 'lauk_pendamping')
        {
            $model->hapus('lauk_pendamping', $request);
            return redirect('/dashboard/menu')->with('success', 'Lauk Pendamping berhasil dihapus');
        }
    }
}
