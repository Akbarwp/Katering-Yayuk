@extends('dashboard.layouts.main')

@section('container')
    <section id="homeMenu" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center">
                    <h1 class="mb-5 text-dark text-5xl font-bold">Daftar Menu Makanan</h1>
                </div>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success shadow-lg max-w-xl mx-auto">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <div class="w-full pt-16 px-6 text-dark ">
                {{-- Nasi --}}
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-2/3 mx-auto text-center justify-center text-light">
                        <!-- head -->
                        <caption class="text-2xl text-dark mb-2 font-semibold">
                            Daftar Nasi
                            <a href="nasi/tambah"
                                class="btn btn-circle btn-sm btn-success ml-2 hover:bg-opacity-80">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" />
                                </svg>
                            </a>
                        </caption>
                        <thead class="text-light">
                            <tr>
                                <th class="text-base bg-dark">ID</th>
                                <th class="text-base bg-dark">Nama</th>
                                <th class="text-base bg-dark">Harga</th>
                                <th class="text-base bg-dark">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            @foreach ($nasi as $nas)
                                <tr>
                                    <th class="bg-primary">{{ $nas->id }}</th>
                                    <td class="bg-primary">{{ $nas->nama }}</td>
                                    <td class="bg-primary">Rp{{ $nas->harga }}</td>
                                    <td class="bg-primary">
                                        <a href="nasi/ubah/{{ $nas->id }}"
                                            class="btn btn-warning mr-2 hover:bg-opacity-80">Ubah</a>
                                        <a href="nasi/hapus/{{ $nas->id }}" class="btn btn-error hover:bg-opacity-80"
                                            onclick="return confirm('Are you sure?')">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Lauk Utama --}}
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-2/3 mx-auto text-center justify-center text-light">
                        <!-- head -->
                        <caption class="text-2xl text-dark mb-2 mt-10 font-semibold">
                            Daftar Lauk Utama
                            <a href="lauk_utama/tambah"
                                class="btn btn-circle btn-sm btn-success ml-2 hover:bg-opacity-80">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" />
                                </svg>
                            </a>
                        </caption>
                        <thead class="text-light">
                            <tr>
                                <th class="text-base bg-dark">ID</th>
                                <th class="text-base bg-dark">Nama</th>
                                <th class="text-base bg-dark">Harga</th>
                                <th class="text-base bg-dark">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            @foreach ($lauk_utama as $lu)
                                <tr>
                                    <th class="bg-primary">{{ $lu->id }}</th>
                                    <td class="bg-primary">{{ $lu->nama }}</td>
                                    <td class="bg-primary">Rp{{ $lu->harga }}</td>
                                    <td class="bg-primary">
                                        <a href="lauk_utama/ubah/{{ $lu->id }}"
                                            class="btn btn-warning mr-2 hover:bg-opacity-80">Ubah</a>
                                        <a href="lauk_utama/hapus/{{ $lu->id }}"
                                            class="btn btn-error hover:bg-opacity-80"
                                            onclick="return confirm('Are you sure?')">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Lauk Pendamping --}}
                <div class="overflow-x-auto">
                    <table class="table table-zebra w-2/3 mx-auto text-center justify-center text-light">
                        <!-- head -->
                        <caption class="text-2xl text-dark mb-2 mt-10 font-semibold">
                            Daftar Lauk Pendamping
                            <a href="lauk_pendamping/tambah"
                                class="btn btn-circle btn-sm btn-success ml-2 hover:bg-opacity-80">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z" />
                                    <path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" />
                                </svg>
                            </a>
                        </caption>
                        <thead class="text-light">
                            <tr>
                                <th class="text-base bg-dark">ID</th>
                                <th class="text-base bg-dark">Nama</th>
                                <th class="text-base bg-dark">Harga</th>
                                <th class="text-base bg-dark">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            @foreach ($lauk_pendamping as $lp)
                                <tr>
                                    <th class="bg-primary">{{ $lp->id }}</th>
                                    <td class="bg-primary">{{ $lp->nama }}</td>
                                    <td class="bg-primary">Rp{{ $lp->harga }}</td>
                                    <td class="bg-primary">
                                        <a href="lauk_pendamping/ubah/{{ $lp->id }}"
                                            class="btn btn-warning mr-2 hover:bg-opacity-80">Ubah</a>
                                        <a href="lauk_pendamping/hapus/{{ $lp->id }}"
                                            class="btn btn-error hover:bg-opacity-80"
                                            onclick="return confirm('Are you sure?')">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
