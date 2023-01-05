<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perbandingan extends Model
{
    use HasFactory;

    function lihat($id, $tabel)
    {
        $lihat = DB::table($tabel)->where('id_kriteria_dari', $id)->get();
        return $lihat;
    }

    function jumlah()
    {
        $jml = DB::table('kriteria_nilai_jumlah')->get();
        return $jml;
    }

    function jumlahSub($kriteria)
    {
        $jml = DB::table('sub_kriteria_nilai_jumlah')->where('kriteria', $kriteria)->get();
        return $jml;
    }

    function hitung($id, $tabel, $where)
    {
        $hitung = DB::table($tabel)->where($where, $id)->sum('nilai');
        $hasil = round($hitung, 3);
        return $hasil;
    }

    function prioritas()
    {
        $lihat = DB::table('kriteria_prioritas')->get();
        return $lihat;
    }

    function prioritasSub($kriteria)
    {
        $lihat = DB::table('sub_kriteria_prioritas')->where('kriteria', $kriteria)->get();
        return $lihat;
    }

    function lihatSub($kriteria, $subID, $tabel)
    {
        $lihat = DB::table($tabel)->where([
            'id_kriteria' => $kriteria,
            'id_sub_kriteria_dari'=> $subID
        ])->get();

        return $lihat;
    }

    function hitungSub($kriteria, $subID, $tabel)
    {
        $hitung = DB::table($tabel)->where([
            'id_kriteria' => $kriteria,
            'id_sub_kriteria_tujuan' => $subID
        ])
        ->sum('nilai');
        
        $kriteria = DB::table('kriteria')->count('id');

        $hasil = round($hitung, $kriteria);
        return $hasil;
    }

    function lihatNilai($id)
    {
        $nilai = DB::table('kriteria_nilai')->where('id', $id)->get();
        return $nilai;
    }

    function lihatNilaiSub($id)
    {
        $nilai = DB::table('sub_kriteria_nilai')->where('id', $id)->get();
        return $nilai;
    }

    // Kriteria
    function perbarui($request)
    {

        $kriteria = DB::table('kriteria')->count('id');

        // Matriks Perbandingan Nilai
        DB::table('kriteria_nilai')->where('id', 'KN002')->update([
            'nilai' => $request->KN002
        ]);
        
        DB::table('kriteria_nilai')->where('id', 'KN003')->update([
            'nilai' => $request->KN003
        ]);

        DB::table('kriteria_nilai')->where('id', 'KN006')->update([
            'nilai' => $request->KN006
        ]);


        $kn4 = round((1/$request->KN002), 3);
        DB::table('kriteria_nilai')->where('id', 'KN004')->update([
            'nilai' => $kn4
        ]);

        $kn7 = round((1/$request->KN003), 3);
        DB::table('kriteria_nilai')->where('id', 'KN007')->update([
            'nilai' => $kn7
        ]);

        $kn8 = round(($request->KN002/$request->KN003), 3);
        DB::table('kriteria_nilai')->where('id', 'KN008')->update([
            'nilai' => $kn8
        ]);


        // Jumlah Matriks Perbandingan Nilai
        $hitung1 = round(DB::table('kriteria_nilai')->where('id_kriteria_dari', 'K001')->sum('nilai'), 3);
        $hitung2 = round(DB::table('kriteria_nilai')->where('id_kriteria_dari', 'K002')->sum('nilai'), 3);
        $hitung3 = round(DB::table('kriteria_nilai')->where('id_kriteria_dari', 'K003')->sum('nilai'), 3);

        DB::table('kriteria_nilai_jumlah')->where('kriteria', 'K001')->update([
            'jumlah' => $hitung1,
        ]);
        DB::table('kriteria_nilai_jumlah')->where('kriteria', 'K002')->update([
            'jumlah' => $hitung2,
        ]);
        DB::table('kriteria_nilai_jumlah')->where('kriteria', 'K003')->update([
            'jumlah' => $hitung3,
        ]);


        // Matriks Prioritas
        DB::table('matriks_nilai')->where('id', 'MN001')->update([
            'nilai' => round((1/$hitung1), 3)
        ]);
        DB::table('matriks_nilai')->where('id', 'MN002')->update([
            'nilai' => round(($request->KN002/$hitung1), 3)
        ]);
        DB::table('matriks_nilai')->where('id', 'MN003')->update([
            'nilai' => round(($request->KN003/$hitung1), 3)
        ]);

        DB::table('matriks_nilai')->where('id', 'MN004')->update([
            'nilai' => round(($kn4/$hitung2), 3) 
        ]);
        DB::table('matriks_nilai')->where('id', 'MN005')->update([
            'nilai' => round((1/$hitung2), 3)
        ]);
        DB::table('matriks_nilai')->where('id', 'MN006')->update([
            'nilai' => round(($request->KN006/$hitung2), 3)
        ]);

        DB::table('matriks_nilai')->where('id', 'MN007')->update([
            'nilai' => round(($kn7/$hitung3), 3)
        ]);
        DB::table('matriks_nilai')->where('id', 'MN008')->update([
            'nilai' => round(($kn8/$hitung3), 3)
        ]);
        DB::table('matriks_nilai')->where('id', 'MN009')->update([
            'nilai' => round((1/$hitung3), 3)
        ]);

        // Prioritas
        $matriks1 = round(DB::table('matriks_nilai')->where('id_kriteria_tujuan', 'K001')->sum('nilai'), 3);
        $matriks2 = round(DB::table('matriks_nilai')->where('id_kriteria_tujuan', 'K002')->sum('nilai'), 3);
        $matriks3 = round(DB::table('matriks_nilai')->where('id_kriteria_tujuan', 'K003')->sum('nilai'), 3);

        DB::table('kriteria_prioritas')->where('id_kriteria', 'K001')->update([
            'prioritas' => round(($matriks1/$kriteria), 3),
        ]);
        DB::table('kriteria_prioritas')->where('id_kriteria', 'K002')->update([
            'prioritas' => round(($matriks2/$kriteria), 3),
        ]);
        DB::table('kriteria_prioritas')->where('id_kriteria', 'K003')->update([
            'prioritas' => round(($matriks3/$kriteria), 3),
        ]);
    }

    function perbaruiSubHarga($request)
    {

        $kriteria = DB::table('sub_kriteria')->count('id');

        // Matriks Perbandingan Nilai Sub Kriteria Harga
        DB::table('sub_kriteria_nilai')->where('id', 'SKN002')->update([
            'nilai' => $request->SKN002
        ]);
        
        DB::table('sub_kriteria_nilai')->where('id', 'SKN003')->update([
            'nilai' => $request->SKN003
        ]);

        DB::table('sub_kriteria_nilai')->where('id', 'SKN006')->update([
            'nilai' => $request->SKN006
        ]);


        $kn4 = round((1/$request->SKN002), 3);
        DB::table('sub_kriteria_nilai')->where('id', 'SKN004')->update([
            'nilai' => $kn4
        ]);

        $kn7 = round((1/$request->SKN003), 3);
        DB::table('sub_kriteria_nilai')->where('id', 'SKN007')->update([
            'nilai' => $kn7
        ]);

        $kn8 = round(($request->SKN002/$request->SKN003), 3);
        DB::table('sub_kriteria_nilai')->where('id', 'SKN008')->update([
            'nilai' => $kn8
        ]);


        // Jumlah Matriks Perbandingan Nilai
        $hitung1 = round(DB::table('sub_kriteria_nilai')->where([
            'id_kriteria' => 'K001',
            'id_sub_kriteria_dari' => 'SK001'
        ])->sum('nilai'), 3);

        $hitung2 = round(DB::table('sub_kriteria_nilai')->where([
            'id_kriteria' => 'K001',
            'id_sub_kriteria_dari' => 'SK002'
        ])->sum('nilai'), 3);
        
        $hitung3 = round(DB::table('sub_kriteria_nilai')->where([
            'id_kriteria' => 'K001',
            'id_sub_kriteria_dari' => 'SK003'
        ])->sum('nilai'), 3);

        DB::table('sub_kriteria_nilai_jumlah')->where([
            'kriteria' => 'K001',
            'sub_kriteria' => 'SK001',
            ])->update([
            'jumlah' => $hitung1,
        ]);
        DB::table('sub_kriteria_nilai_jumlah')->where([
            'kriteria' => 'K001',
            'sub_kriteria' => 'SK002',
        ])->update([
            'jumlah' => $hitung2,
        ]);
        DB::table('sub_kriteria_nilai_jumlah')->where([
            'kriteria' => 'K001',
            'sub_kriteria' => 'SK003',
        ])->update([
            'jumlah' => $hitung3,
        ]);


        // Matriks Prioritas
        DB::table('matriks_sub_nilai')->where('id', 'MSN001')->update([
            'nilai' => round((1/$hitung1), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN002')->update([
            'nilai' => round(($request->SKN002/$hitung1), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN003')->update([
            'nilai' => round(($request->SKN003/$hitung1), 3)
        ]);

        DB::table('matriks_sub_nilai')->where('id', 'MSN004')->update([
            'nilai' => round(($kn4/$hitung2), 3) 
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN005')->update([
            'nilai' => round((1/$hitung2), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN006')->update([
            'nilai' => round(($request->SKN006/$hitung2), 3)
        ]);

        DB::table('matriks_sub_nilai')->where('id', 'MSN007')->update([
            'nilai' => round(($kn7/$hitung3), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN008')->update([
            'nilai' => round(($kn8/$hitung3), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN009')->update([
            'nilai' => round((1/$hitung3), 3)
        ]);

        // Prioritas
        $matriks1 = round(DB::table('matriks_sub_nilai')->where([
            'id_kriteria' => 'K001',
            'id_sub_kriteria_tujuan' => 'SK001',
        ])->sum('nilai'), 3);
        $matriks2 = round(DB::table('matriks_sub_nilai')->where([
            'id_kriteria' => 'K001',
            'id_sub_kriteria_tujuan' => 'SK002',
        ])->sum('nilai'), 3);
        $matriks3 = round(DB::table('matriks_sub_nilai')->where([
            'id_kriteria' => 'K001',
            'id_sub_kriteria_tujuan' => 'SK003',
        ])->sum('nilai'), 3);

        DB::table('sub_kriteria_prioritas')->where('id', 'SKP001')->update([
            'prioritas' => round(($matriks1/$kriteria), 3),
        ]);
        DB::table('sub_kriteria_prioritas')->where('id', 'SKP002')->update([
            'prioritas' => round(($matriks2/$kriteria), 3),
        ]);
        DB::table('sub_kriteria_prioritas')->where('id', 'SKP003')->update([
            'prioritas' => round(($matriks3/$kriteria), 3),
        ]);
    }

    function perbaruiSubJmlMenu($request)
    {

        $kriteria = DB::table('sub_kriteria')->count('id');

        // Matriks Perbandingan Nilai Sub Kriteria Harga
        DB::table('sub_kriteria_nilai')->where('id', 'SKN011')->update([
            'nilai' => $request->SKN011
        ]);
        
        DB::table('sub_kriteria_nilai')->where('id', 'SKN012')->update([
            'nilai' => $request->SKN012
        ]);

        DB::table('sub_kriteria_nilai')->where('id', 'SKN015')->update([
            'nilai' => $request->SKN015
        ]);


        $kn4 = round((1/$request->SKN011), 3);
        DB::table('sub_kriteria_nilai')->where('id', 'SKN013')->update([
            'nilai' => $kn4
        ]);

        $kn7 = round((1/$request->SKN012), 3);
        DB::table('sub_kriteria_nilai')->where('id', 'SKN016')->update([
            'nilai' => $kn7
        ]);

        $kn8 = round(($request->SKN011/$request->SKN012), 3);
        DB::table('sub_kriteria_nilai')->where('id', 'SKN017')->update([
            'nilai' => $kn8
        ]);


        // Jumlah Matriks Perbandingan Nilai
        $hitung1 = round(DB::table('sub_kriteria_nilai')->where([
            'id_kriteria' => 'K002',
            'id_sub_kriteria_dari' => 'SK001'
        ])->sum('nilai'), 3);

        $hitung2 = round(DB::table('sub_kriteria_nilai')->where([
            'id_kriteria' => 'K002',
            'id_sub_kriteria_dari' => 'SK002'
        ])->sum('nilai'), 3);
        
        $hitung3 = round(DB::table('sub_kriteria_nilai')->where([
            'id_kriteria' => 'K002',
            'id_sub_kriteria_dari' => 'SK003'
        ])->sum('nilai'), 3);

        DB::table('sub_kriteria_nilai_jumlah')->where([
            'kriteria' => 'K002',
            'sub_kriteria' => 'SK001',
            ])->update([
            'jumlah' => $hitung1,
        ]);
        DB::table('sub_kriteria_nilai_jumlah')->where([
            'kriteria'=> 'K002',
            'sub_kriteria' => 'SK002',
        ])->update([
            'jumlah' => $hitung2,
        ]);
        DB::table('sub_kriteria_nilai_jumlah')->where([
            'kriteria' => 'K002',
            'sub_kriteria' => 'SK003',
        ])->update([
            'jumlah' => $hitung3,
        ]);


        // Matriks Prioritas
        DB::table('matriks_sub_nilai')->where('id', 'MSN010')->update([
            'nilai' => round((1/$hitung1), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN011')->update([
            'nilai' => round(($request->SKN011/$hitung1), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN012')->update([
            'nilai' => round(($request->SKN012/$hitung1), 3)
        ]);

        DB::table('matriks_sub_nilai')->where('id', 'MSN013')->update([
            'nilai' => round(($kn4/$hitung2), 3) 
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN014')->update([
            'nilai' => round((1/$hitung2), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN015')->update([
            'nilai' => round(($request->SKN015/$hitung2), 3)
        ]);

        DB::table('matriks_sub_nilai')->where('id', 'MSN016')->update([
            'nilai' => round(($kn7/$hitung3), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN017')->update([
            'nilai' => round(($kn8/$hitung3), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN018')->update([
            'nilai' => round((1/$hitung3), 3)
        ]);

        // Prioritas
        $matriks1 = round(DB::table('matriks_sub_nilai')->where([
            'id_kriteria' => 'K002',
            'id_sub_kriteria_tujuan' => 'SK001',
        ])->sum('nilai'), 3);
        $matriks2 = round(DB::table('matriks_sub_nilai')->where([
            'id_kriteria' => 'K002',
            'id_sub_kriteria_tujuan' => 'SK002',
        ])->sum('nilai'), 3);
        $matriks3 = round(DB::table('matriks_sub_nilai')->where([
            'id_kriteria' => 'K002',
            'id_sub_kriteria_tujuan' => 'SK003',
        ])->sum('nilai'), 3);

        DB::table('sub_kriteria_prioritas')->where('id', 'SKP004')->update([
            'prioritas' => round(($matriks1/$kriteria), 3),
        ]);
        DB::table('sub_kriteria_prioritas')->where('id', 'SKP005')->update([
            'prioritas' => round(($matriks2/$kriteria), 3),
        ]);
        DB::table('sub_kriteria_prioritas')->where('id', 'SKP006')->update([
            'prioritas' => round(($matriks3/$kriteria), 3),
        ]);
    }

    function perbaruiSubPopularitas($request)
    {

        $kriteria = DB::table('sub_kriteria')->count('id');

        // Matriks Perbandingan Nilai Sub Kriteria Harga
        DB::table('sub_kriteria_nilai')->where('id', 'SKN020')->update([
            'nilai' => $request->SKN020
        ]);
        
        DB::table('sub_kriteria_nilai')->where('id', 'SKN021')->update([
            'nilai' => $request->SKN021
        ]);

        DB::table('sub_kriteria_nilai')->where('id', 'SKN024')->update([
            'nilai' => $request->SKN024
        ]);


        $kn4 = round((1/$request->SKN020), 3);
        DB::table('sub_kriteria_nilai')->where('id', 'SKN022')->update([
            'nilai' => $kn4
        ]);

        $kn7 = round((1/$request->SKN021), 3);
        DB::table('sub_kriteria_nilai')->where('id', 'SKN025')->update([
            'nilai' => $kn7
        ]);

        $kn8 = round(($request->SKN020/$request->SKN021), 3);
        DB::table('sub_kriteria_nilai')->where('id', 'SKN026')->update([
            'nilai' => $kn8
        ]);


        // Jumlah Matriks Perbandingan Nilai
        $hitung1 = round(DB::table('sub_kriteria_nilai')->where([
            'id_kriteria' => 'K003',
            'id_sub_kriteria_dari' => 'SK001'
        ])->sum('nilai'), 3);

        $hitung2 = round(DB::table('sub_kriteria_nilai')->where([
            'id_kriteria' => 'K003',
            'id_sub_kriteria_dari' => 'SK002'
        ])->sum('nilai'), 3);
        
        $hitung3 = round(DB::table('sub_kriteria_nilai')->where([
            'id_kriteria' => 'K003',
            'id_sub_kriteria_dari' => 'SK003'
        ])->sum('nilai'), 3);

        DB::table('sub_kriteria_nilai_jumlah')->where([
            'kriteria' => 'K003',
            'sub_kriteria' => 'SK001',
            ])->update([
            'jumlah' => $hitung1,
        ]);
        DB::table('sub_kriteria_nilai_jumlah')->where([
            'kriteria'=> 'K003',
            'sub_kriteria' => 'SK002',
        ])->update([
            'jumlah' => $hitung2,
        ]);
        DB::table('sub_kriteria_nilai_jumlah')->where([
            'kriteria' => 'K003',
            'sub_kriteria' => 'SK003',
        ])->update([
            'jumlah' => $hitung3,
        ]);


        // Matriks Prioritas
        DB::table('matriks_sub_nilai')->where('id', 'MSN019')->update([
            'nilai' => round((1/$hitung1), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN020')->update([
            'nilai' => round(($request->SKN020/$hitung1), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN021')->update([
            'nilai' => round(($request->SKN021/$hitung1), 3)
        ]);

        DB::table('matriks_sub_nilai')->where('id', 'MSN022')->update([
            'nilai' => round(($kn4/$hitung2), 3) 
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN023')->update([
            'nilai' => round((1/$hitung2), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN024')->update([
            'nilai' => round(($request->SKN024/$hitung2), 3)
        ]);

        DB::table('matriks_sub_nilai')->where('id', 'MSN025')->update([
            'nilai' => round(($kn7/$hitung3), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN026')->update([
            'nilai' => round(($kn8/$hitung3), 3)
        ]);
        DB::table('matriks_sub_nilai')->where('id', 'MSN027')->update([
            'nilai' => round((1/$hitung3), 3)
        ]);

        // Prioritas
        $matriks1 = round(DB::table('matriks_sub_nilai')->where([
            'id_kriteria' => 'K003',
            'id_sub_kriteria_tujuan' => 'SK001',
        ])->sum('nilai'), 3);
        $matriks2 = round(DB::table('matriks_sub_nilai')->where([
            'id_kriteria' => 'K003',
            'id_sub_kriteria_tujuan' => 'SK002',
        ])->sum('nilai'), 3);
        $matriks3 = round(DB::table('matriks_sub_nilai')->where([
            'id_kriteria' => 'K003',
            'id_sub_kriteria_tujuan' => 'SK003',
        ])->sum('nilai'), 3);

        DB::table('sub_kriteria_prioritas')->where('id', 'SKP007')->update([
            'prioritas' => round(($matriks1/$kriteria), 3),
        ]);
        DB::table('sub_kriteria_prioritas')->where('id', 'SKP008')->update([
            'prioritas' => round(($matriks2/$kriteria), 3),
        ]);
        DB::table('sub_kriteria_prioritas')->where('id', 'SKP009')->update([
            'prioritas' => round(($matriks3/$kriteria), 3),
        ]);
    }
}
