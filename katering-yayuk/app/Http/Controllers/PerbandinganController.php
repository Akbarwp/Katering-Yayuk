<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Perbandingan;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class PerbandinganController extends Controller
{
    function index()
    {
        $model = new Perbandingan();
        $kriteriaNilai1 = $model->lihat('K001','kriteria_nilai');
        $kriteriaNilai2 = $model->lihat('K002','kriteria_nilai');
        $kriteriaNilai3 = $model->lihat('K003','kriteria_nilai');

        $jumlah = $model->jumlah();
        
        $model2 = new Kriteria();
        $kriteria = $model2->lihat();

        return view('dashboard.perbandingan.index', [
            'title' => 'Perbandingan Kriteria',
            'kriteriaNilai1' => $kriteriaNilai1,
            'kriteriaNilai2' => $kriteriaNilai2,
            'kriteriaNilai3' => $kriteriaNilai3,
            'kriteria' => $kriteria,
            'jumlah' => $jumlah,
        ]);
    }

    function matriksNilai()
    {
        $model = new Perbandingan();
        $matriksNilai1 = $model->lihat('K001', 'matriks_nilai');
        $matriksNilai2 = $model->lihat('K002', 'matriks_nilai');
        $matriksNilai3 = $model->lihat('K003', 'matriks_nilai');

        $hitung[] = $model->hitung('K001','matriks_nilai','id_kriteria_tujuan');
        $hitung[] = $model->hitung('K002','matriks_nilai','id_kriteria_tujuan');
        $hitung[] = $model->hitung('K003','matriks_nilai','id_kriteria_tujuan');

        $prioritas = $model->prioritas();
        
        $model2 = new Kriteria();
        $kriteria = $model2->lihat();

        return view('dashboard.perbandingan.matriksNilai', [
            'title' => 'Matriks Nilai Kriteria',
            'matriksNilai1' => $matriksNilai1,
            'matriksNilai2' => $matriksNilai2,
            'matriksNilai3' => $matriksNilai3,
            'kriteria' => $kriteria,
            'jumlah' => $hitung,
            'prioritas' => $prioritas,
        ]);
    }

    function subKriteria()
    {
        $model = new Perbandingan();
        // Harga
        $nilaiHarga1 = $model->lihatSub('K001', 'SK001','sub_kriteria_nilai');
        $nilaiHarga2 = $model->lihatSub('K001', 'SK002','sub_kriteria_nilai');
        $nilaiHarga3 = $model->lihatSub('K001', 'SK003','sub_kriteria_nilai');

        $hitungHarga = $model->jumlahSub('K001');

        // Jumlah Menu
        $nilaiJmlMenu1 = $model->lihatSub('K002', 'SK001','sub_kriteria_nilai');
        $nilaiJmlMenu2 = $model->lihatSub('K002', 'SK002','sub_kriteria_nilai');
        $nilaiJmlMenu3 = $model->lihatSub('K002', 'SK003','sub_kriteria_nilai');

        $hitungJmlMenu = $model->jumlahSub('K002');

        // Popularitas
        $nilaiPopularitas1 = $model->lihatSub('K003', 'SK001','sub_kriteria_nilai');
        $nilaiPopularitas2 = $model->lihatSub('K003', 'SK002','sub_kriteria_nilai');
        $nilaiPopularitas3 = $model->lihatSub('K003', 'SK003','sub_kriteria_nilai');

        $hitungPopularitas = $model->jumlahSub('K003');
        
        $model2 = new Kriteria();
        $kriteria = $model2->lihat();
        $subKriteria = $model2->lihatSubKriteria();

        return view('dashboard.perbandingan.subKriteria', [
            'title' => 'Perbandingan Sub Kriteria',
            'kriteria' => $kriteria,
            'subKriteria' => $subKriteria,
            'nilaiHarga1' => $nilaiHarga1,
            'nilaiHarga2' => $nilaiHarga2,
            'nilaiHarga3' => $nilaiHarga3,
            'jumlahHarga' => $hitungHarga,

            'nilaiJmlMenu1' => $nilaiJmlMenu1,
            'nilaiJmlMenu2' => $nilaiJmlMenu2,
            'nilaiJmlMenu3' => $nilaiJmlMenu3,
            'jumlahJmlMenu' => $hitungJmlMenu,

            'nilaiPopularitas1' => $nilaiPopularitas1,
            'nilaiPopularitas2' => $nilaiPopularitas2,
            'nilaiPopularitas3' => $nilaiPopularitas3,
            'jumlahPopularitas' => $hitungPopularitas,
        ]);
    }

    function ubahh()
    {
        $model = new Perbandingan();

        $kn2 = $model->lihatNilai('KN002');
        $kn3 = $model->lihatNilai('KN003');
        $kn6 = $model->lihatNilai('KN006');

        return view('dashboard.perbandingan.ubahKriteria', [
            'title' => 'Ubah Bobot  Kriteria',
            'kn2' => $kn2,
            'kn3' => $kn3,
            'kn6' => $kn6,
        ]);
    }

    function update(Request $request)
    {
        $model = new Perbandingan();
        $model->perbarui($request);

        return redirect('/dashboard/perbandingan')->with('success', 'Bobot berhasil diperbarui');
    }

    function matriksNilaiSubKriteria(Request $request)
    {
        $model = new Perbandingan();
        $model2 = new Kriteria();

        if ($request->kriteria == 'harga') {
            // Harga
            $nilaiMatriks1 = $model->lihatSub('K001', 'SK001','matriks_sub_nilai');
            $nilaiMatriks2 = $model->lihatSub('K001', 'SK002','matriks_sub_nilai');
            $nilaiMatriks3 = $model->lihatSub('K001', 'SK003','matriks_sub_nilai');

            $hitungHarga[] = $model->hitungSub('K001', 'SK001','matriks_sub_nilai');
            $hitungHarga[] = $model->hitungSub('K001', 'SK002','matriks_sub_nilai');
            $hitungHarga[] = $model->hitungSub('K001', 'SK003','matriks_sub_nilai');

            $prioritas = $model->prioritasSub('K001');
            $subKriteria = $model2->lihatSubKriteria();

            return view('dashboard.perbandingan.matriksNilaiSub', [
                'title' => 'Perbandingan Sub Kriteria',
                'subKriteria' => $subKriteria,
                'nilaiMatriks1' => $nilaiMatriks1,
                'nilaiMatriks2' => $nilaiMatriks2,
                'nilaiMatriks3' => $nilaiMatriks3,
                'jumlah' => $hitungHarga,
                'prioritas' => $prioritas,
            ]);

        } elseif ($request->kriteria == 'jumlah_menu') {
            // Jumlah Menu
            $nilaiMatriks1 = $model->lihatSub('K002', 'SK001','matriks_sub_nilai');
            $nilaiMatriks2 = $model->lihatSub('K002', 'SK002','matriks_sub_nilai');
            $nilaiMatriks3 = $model->lihatSub('K002', 'SK003','matriks_sub_nilai');

            $hitungJmlMenu[] = $model->hitungSub('K002', 'SK001','matriks_sub_nilai');
            $hitungJmlMenu[] = $model->hitungSub('K002', 'SK002','matriks_sub_nilai');
            $hitungJmlMenu[] = $model->hitungSub('K002', 'SK003','matriks_sub_nilai');

            $prioritas = $model->prioritasSub('K002');
            $subKriteria = $model2->lihatSubKriteria();

            return view('dashboard.perbandingan.matriksNilaiSub', [
                'title' => 'Perbandingan Sub Kriteria',
                'subKriteria' => $subKriteria,
                'nilaiMatriks1' => $nilaiMatriks1,
                'nilaiMatriks2' => $nilaiMatriks2,
                'nilaiMatriks3' => $nilaiMatriks3,
                'jumlah' => $hitungJmlMenu,
                'prioritas' => $prioritas,
            ]);

        } elseif ($request->kriteria == 'popularitas') {
            // Popularitas
            $nilaiMatriks1 = $model->lihatSub('K003', 'SK001','matriks_sub_nilai');
            $nilaiMatriks2 = $model->lihatSub('K003', 'SK002','matriks_sub_nilai');
            $nilaiMatriks3 = $model->lihatSub('K003', 'SK003','matriks_sub_nilai');

            $hitungPopularitas[] = $model->hitungSub('K003', 'SK001','matriks_sub_nilai');
            $hitungPopularitas[] = $model->hitungSub('K003', 'SK002','matriks_sub_nilai');
            $hitungPopularitas[] = $model->hitungSub('K003', 'SK003','matriks_sub_nilai');

            $prioritas = $model->prioritasSub('K003');
            $subKriteria = $model2->lihatSubKriteria();

            return view('dashboard.perbandingan.matriksNilaiSub', [
                'title' => 'Perbandingan Sub Kriteria',
                'subKriteria' => $subKriteria,
                'nilaiMatriks1' => $nilaiMatriks1,
                'nilaiMatriks2' => $nilaiMatriks2,
                'nilaiMatriks3' => $nilaiMatriks3,
                'jumlah' => $hitungPopularitas,
                'prioritas' => $prioritas,
            ]);
        }
    }

    function ubahSub(Request $request)
    {
        $model = new Perbandingan();

        if ($request->kriteria == 'harga') {
            $skn2 = $model->lihatNilaiSub('SKN002');
            $skn3 = $model->lihatNilaiSub('SKN003');
            $skn6 = $model->lihatNilaiSub('SKN006');
    
            return view('dashboard.perbandingan.ubahSubKriteria', [
                'title' => 'Ubah Bobot Sub Kriteria',
                'skn2' => $skn2,
                'skn3' => $skn3,
                'skn6' => $skn6,
                'kriteria' => $request->kriteria,
            ]);

        } elseif ($request->kriteria == 'jumlah_menu') {
            $skn11 = $model->lihatNilaiSub('SKN011');
            $skn12 = $model->lihatNilaiSub('SKN012');
            $skn15 = $model->lihatNilaiSub('SKN015');
    
            return view('dashboard.perbandingan.ubahSubKriteria', [
                'title' => 'Ubah Bobot Sub Kriteria',
                'skn11' => $skn11,
                'skn12' => $skn12,
                'skn15' => $skn15,
                'kriteria' => $request->kriteria,
            ]);

        } elseif ($request->kriteria == 'popularitas') {
            $skn20 = $model->lihatNilaiSub('SKN020');
            $skn21 = $model->lihatNilaiSub('SKN021');
            $skn24 = $model->lihatNilaiSub('SKN024');
    
            return view('dashboard.perbandingan.ubahSubKriteria', [
                'title' => 'Ubah Bobot Sub Kriteria',
                'skn20' => $skn20,
                'skn21' => $skn21,
                'skn24' => $skn24,
                'kriteria' => $request->kriteria,
            ]);
        }
    }

    function updateSub(Request $request)
    {
        $model = new Perbandingan();

        if ($request->kriteria == 'harga') {
            $model->perbaruiSubHarga($request);
            
        } elseif ($request->kriteria == 'jumlah_menu') {
            $model->perbaruiSubJmlMenu($request);

        } elseif ($request->kriteria == 'popularitas') {
            $model->perbaruiSubPopularitas($request);
        } 

        return redirect('/dashboard/perbandingan/subKriteria')->with('success', 'Bobot berhasil diperbarui');
    }
}
