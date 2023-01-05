@extends('dashboard.layouts.main')

@section('container')
    <section id="homeMatriksSub" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center">
                    <h1 class="mb-5 text-dark text-5xl font-bold">
                        Matriks Nilai Sub Kriteria
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
                                @foreach ($nilaiMatriks1 as $mn)
                                <tr>
                                    <td class="bg-primary">{{ $mn->nilai }}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                        <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                            <tr>
                                <th class="bg-primary">Cukup</th>
                                @foreach ($nilaiMatriks2 as $mn)
                                <tr>
                                    <td class="bg-primary">{{ $mn->nilai }}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                        <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                            <tr>
                                <th class="bg-primary">Kurang</th>
                                @foreach ($nilaiMatriks3 as $mn)
                                <tr>
                                    <td class="bg-primary">{{ $mn->nilai }}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                        <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                            <tr>
                                <th class="bg-primary">Jumlah</th>
                                @foreach ($jumlah as $jml)
                                <tr>
                                    <td class="bg-primary">{{ $jml }}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                        <table class="table table-zebra w-full mx-auto text-center justify-center text-light">
                            <tr>
                                <th class="bg-primary">Prioritas</th>
                                @foreach ($prioritas as $prio)
                                <tr>
                                    <td class="bg-primary">{{ $prio->prioritas }}</td>
                                </tr>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                    <a href="/dashboard/perbandingan/subKriteria" class="btn btn-accent mt-5">Kembali</a>
                </div>
            </div>
        </div>
    </section>
@endsection
