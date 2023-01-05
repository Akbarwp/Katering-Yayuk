@extends('dashboard.layouts.main')

@section('container')
    <section id="homeKriteria" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center">
                    <h1 class="mb-5 text-dark text-5xl font-bold">
                        Daftar Kriteria
                        <a href="kriteria/tambahh" class="btn btn-circle btn-sm btn-success ml-2 hover:bg-opacity-80">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z" /><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z" /></svg>
                        </a>
                    </h1>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success shadow-lg max-w-xl mx-auto">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
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
                                    <th class="text-base bg-dark">ID</th>
                                    <th class="text-base bg-dark">Nama</th>
                                    <th class="text-base bg-dark">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row -->
                                @foreach ($kriteria as $kri)
                                    <tr>
                                        <th class="bg-primary">{{ $kri->id }}</th>
                                        <td class="bg-primary">{{ $kri->nama }}</td>
                                        <td class="bg-primary">
                                            <a href="kriteria/ubahh/{{ $kri->id }}"
                                                class="btn btn-warning mr-2 hover:bg-opacity-80">Ubah</a>
                                            <a href="kriteria/hapuss/{{ $kri->id }}"
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
        </div>
    </section>
@endsection
