@extends('dashboard.layouts.main')

@section('container')
    <section id="homePerbandingan" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center">
                    <h1 class="mb-5 text-dark text-5xl font-bold">
                        Ubah Daftar Perbandingan
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
                    <form action="" method="post">
                        @csrf
                        <div class="form-control w-full max-w-lg mx-auto mb-5">
                            @foreach ($kn2 as $kn2)
                                <label class="label">
                                    <span class="label-text text-primary font-bold text-xl">{{ $kn2->id_kriteria_dari }} --> {{ $kn2->id_kriteria_tujuan }}:</span>
                                </label>
                                <input type="number" name="KN002" id="KN002" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $kn2->nilai }}" required>
                            @endforeach
                        </div>

                        <div class="form-control w-full max-w-lg mx-auto mb-5">
                            @foreach ($kn3 as $kn3)
                                <label class="label">
                                    <span class="label-text text-primary font-bold text-xl">{{ $kn3->id_kriteria_dari }} --> {{ $kn3->id_kriteria_tujuan }}:</span>
                                </label>
                                <input type="number" name="KN003" id="KN003" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $kn3->nilai }}" required>
                            @endforeach
                        </div>

                        <div class="form-control w-full max-w-lg mx-auto mb-5">
                            @foreach ($kn6 as $kn6)
                                <label class="label">
                                    <span class="label-text text-primary font-bold text-xl">{{ $kn6->id_kriteria_dari }} --> {{ $kn6->id_kriteria_tujuan }}:</span>
                                </label>
                                <input type="number" name="KN006" id="KN006" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $kn6->nilai }}" required>
                            @endforeach
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-5">Ubah</button>
                        <a href="/dashboard/perbandingan" class="btn btn-secondary mt-5">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
