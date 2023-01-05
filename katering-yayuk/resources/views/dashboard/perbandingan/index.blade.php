@extends('dashboard.layouts.main')

@section('container')
    <section id="homePerbandingan" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center">
                    <h1 class="mb-5 text-dark text-5xl font-bold">
                        Daftar Perbandingan
                        <a href="perbandingan/ubahh" class="btn btn-circle btn-sm btn-success ml-2 hover:bg-opacity-80">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z" />
                                <path
                                    d="M12.9 6.858l4.242 4.243L7.242 21H3v-4.243l9.9-9.9zm1.414-1.414l2.121-2.122a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414l-2.122 2.121-4.242-4.242z" />
                            </svg>
                        </a>
                    </h1>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success shadow-lg max-w-xl mx-auto">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                <div class="w-2/3 mx-auto pt-16 px-6 text-dark">
                    <div class="overflow-x-auto flex">
                        <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                            <tr>
                                <th class="bg-primary">Kriteria</th>
                                @foreach ($kriteria as $kri)
                                <tr>
                                    <td class="bg-primary">{{ $kri->nama }}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                        <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                            <tr>
                                <th class="bg-primary">Harga</th>
                                @foreach ($kriteriaNilai1 as $kn)
                                <tr>
                                    <td class="bg-primary">{{ $kn->nilai }}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                        <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                            <tr>
                                <th class="bg-primary">Jumlah Menu</th>
                                @foreach ($kriteriaNilai2 as $kn)
                                <tr>
                                    <td class="bg-primary">{{ $kn->nilai }}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                        <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                            <tr>
                                <th class="bg-primary">Popularitas</th>
                                @foreach ($kriteriaNilai3 as $kn)
                                <tr>
                                    <td class="bg-primary">{{ $kn->nilai }}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                    <table class="table table-zebra w-full mx-auto text-center text-light">
                        <tr>
                            <th class="text-base bg-dark">Jumlah</th>
                            @foreach ($jumlah as $jml)
                                <td class="text-base bg-dark">{{ $jml->jumlah }}</td>
                            @endforeach
                        </tr>
                    </table>
                    <a href="perbandingan/matriksNilai" class="btn btn-primary mt-5">Lihat Matriks</a>
                    <a href="perbandingan/subKriteria" class="btn btn-secondary mt-5">Lihat Sub Kriteria</a>
                </div>
            </div>
        </div>
    </section>
@endsection
