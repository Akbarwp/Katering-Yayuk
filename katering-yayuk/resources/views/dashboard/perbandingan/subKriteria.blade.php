@extends('dashboard.layouts.main')

@section('container')
    <section id="homeSubKriteria" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center">
                    <h1 class="mb-5 text-dark text-5xl font-bold">
                        Daftar Perbandingan Sub Kriteria
                    </h1>
                    <a href="/dashboard/perbandingan" class="btn btn-accent">Kembali</a>
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


                @foreach ($kriteria as $kri)
                    <div class="w-2/3 mx-auto pt-16 px-6 text-dark">
                        <h3 class="mb-5 text-primary text-2xl font-semibold">Kriteria {{ $kri->nama }}</h3>
                        <div class="overflow-x-auto flex">
                            <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                                <tr>
                                    <th class="bg-primary">Sub Kriteria</th>
                                    @foreach ($subKriteria as $sk)
                                    <tr>
                                        <td class="bg-primary">{{ $sk->nama }}</td>
                                    </tr>
                                    @endforeach
                                </tr>
                            </table>
                            <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                                <tr>
                                    <th class="bg-primary">Baik</th>
                                    @if ($kri->nama == 'Harga')
                                        @foreach ($nilaiHarga1 as $skn)
                                        <tr>
                                            <td class="bg-primary">{{ $skn->nilai }}</td>
                                        </tr>
                                        @endforeach
                                    
                                    @elseif ($kri->nama == 'Jumlah Menu')
                                        @foreach ($nilaiJmlMenu1 as $skn)
                                        <tr>
                                            <td class="bg-primary">{{ $skn->nilai }}</td>
                                        </tr>
                                        @endforeach

                                    @elseif ($kri->nama == 'Popularitas')
                                        @foreach ($nilaiPopularitas1 as $skn)
                                        <tr>
                                            <td class="bg-primary">{{ $skn->nilai }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tr>
                            </table>
                            <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                                <tr>
                                    <th class="bg-primary">Cukup</th>
                                    @if ($kri->nama == 'Harga')
                                        @foreach ($nilaiHarga2 as $skn)
                                        <tr>
                                            <td class="bg-primary">{{ $skn->nilai }}</td>
                                        </tr>
                                        @endforeach
                                    
                                    @elseif ($kri->nama == 'Jumlah Menu')
                                        @foreach ($nilaiJmlMenu2 as $skn)
                                        <tr>
                                            <td class="bg-primary">{{ $skn->nilai }}</td>
                                        </tr>
                                        @endforeach

                                    @elseif ($kri->nama == 'Popularitas')
                                        @foreach ($nilaiPopularitas2 as $skn)
                                        <tr>
                                            <td class="bg-primary">{{ $skn->nilai }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tr>
                            </table>
                            <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                                <tr>
                                    <th class="bg-primary">Kurang</th>
                                    @if ($kri->nama == 'Harga')
                                        @foreach ($nilaiHarga3 as $skn)
                                        <tr>
                                            <td class="bg-primary">{{ $skn->nilai }}</td>
                                        </tr>
                                        @endforeach
                                    
                                    @elseif ($kri->nama == 'Jumlah Menu')
                                        @foreach ($nilaiJmlMenu3 as $skn)
                                        <tr>
                                            <td class="bg-primary">{{ $skn->nilai }}</td>
                                        </tr>
                                        @endforeach

                                    @elseif ($kri->nama == 'Popularitas')
                                        @foreach ($nilaiPopularitas3 as $skn)
                                        <tr>
                                            <td class="bg-primary">{{ $skn->nilai }}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tr>
                            </table>
                        </div>
                        <table class="table table-zebra w-full mx-auto text-center text-light">
                            <tr>
                                <th class="text-base bg-dark">Jumlah</th>
                                @if ($kri->nama == 'Harga')
                                    @foreach ($jumlahHarga as $jml)
                                        <td class="text-base bg-dark">{{ $jml->jumlah }}</td>
                                    @endforeach
                                    
                                @elseif ($kri->nama == 'Jumlah Menu')
                                    @foreach ($jumlahJmlMenu as $jml)
                                        <td class="text-base bg-dark">{{ $jml->jumlah }}</td>
                                    @endforeach

                                @elseif ($kri->nama == 'Popularitas')
                                    @foreach ($jumlahPopularitas as $jml)
                                        <td class="text-base bg-dark">{{ $jml->jumlah }}</td>
                                    @endforeach
                                @endif
                            </tr>
                        </table>
                        <a href="matriksNilai/{{ Str::of($kri->nama)->lower()->replace(" ", "_") }}" class="btn btn-primary mt-5">Lihat Matriks</a>
                        <a href="subKriteria/ubahh/{{ Str::of($kri->nama)->lower()->replace(" ", "_") }}" class="btn btn-warning ml-2 hover:bg-opacity-80">Ubah</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
