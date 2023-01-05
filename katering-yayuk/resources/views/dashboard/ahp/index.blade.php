@extends('dashboard.layouts.main')

@section('container')
    <section id="homeAHP" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center">
                    <h1 class="mb-5 text-dark text-5xl font-bold">Hasil Perhitungan AHP</h1>
                    <a href="/dashboard/ahp/hitung" class="btn btn-primary">Hitung</a>
                    <a href="/dashboard/ahp/sorting" class="btn btn-secondary">Sorting</a>
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

                <div class="w-full pt-16 px-6 text-dark ">
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-2/3 mx-auto text-center justify-center text-light">
                            <!-- head -->
                            <thead class="text-light">
                                <tr>
                                    <th class="text-base bg-dark">Alternatif</th>
                                    @foreach ($kriteria as $kri)
                                        <th class="text-base bg-dark">{{ $kri->nama }}</th>
                                    @endforeach
                                    <th class="text-base bg-dark">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row -->
                                @foreach ($hasil_ahp as $ahp)
                                    <tr>
                                        <td class="bg-primary">{{ $ahp->alternatif }}</td>
                                        <td class="bg-primary">{{ $ahp->harga }}</td>
                                        <td class="bg-primary">{{ $ahp->jumlah_menu }}</td>
                                        <td class="bg-primary">{{ $ahp->popularitas }}</td>
                                        <td class="bg-primary">{{ $ahp->jumlah }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
