@extends('layouts.main')

@section('container')
    <section id="home" class="bg-light pb-36">
        <div class="container">
            <div class="w-full pt-16 px-6 text-dark font-sarabun">
                <h1 class="mb-5 text-5xl font-bold">Daftar Menu Makanan</h1>
                
                {{-- Nasi --}}
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-2/3 mx-auto text-center justify-center text-light">
                        <!-- head -->
                        <caption class="text-2xl text-dark mb-2 font-semibold">Daftar Nasi</caption>
                        <thead class="text-light">
                            <tr>
                                <th class="text-base bg-dark">ID</th>
                                <th class="text-base bg-dark">Nama</th>
                                <th class="text-base bg-dark">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            @foreach ($nasi as $nas)
                                <tr>
                                    <th class="bg-primary">{{ $nas->id }}</th>
                                    <td class="bg-primary">{{ $nas->nama }}</td>
                                    <td class="bg-primary">Rp{{ $nas->harga }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Lauk Utama --}}
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-2/3 mx-auto text-center justify-center text-light">
                        <!-- head -->
                        <caption class="text-2xl text-dark mb-2 mt-10 font-semibold">Daftar Lauk Utama</caption>
                        <thead class="text-light">
                            <tr>
                                <th class="text-base bg-dark">ID</th>
                                <th class="text-base bg-dark">Nama</th>
                                <th class="text-base bg-dark">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            @foreach ($lauk_utama as $lu)
                                <tr>
                                    <th class="bg-primary">{{ $lu->id }}</th>
                                    <td class="bg-primary">{{ $lu->nama }}</td>
                                    <td class="bg-primary">Rp{{ $lu->harga }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{-- Lauk Pendamping --}}
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-2/3 mx-auto text-center justify-center text-light">
                        <!-- head -->
                        <caption class="text-2xl text-dark mb-2 mt-10 font-semibold">Daftar Lauk Pendamping</caption>
                        <thead class="text-light">
                            <tr>
                                <th class="text-base bg-dark">ID</th>
                                <th class="text-base bg-dark">Nama</th>
                                <th class="text-base bg-dark">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            @foreach ($lauk_pendamping as $lp)
                                <tr>
                                    <th class="bg-primary">{{ $lp->id }}</th>
                                    <td class="bg-primary">{{ $lp->nama }}</td>
                                    <td class="bg-primary">Rp{{ $lp->harga }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
