@extends('dashboard.layouts.main')

@section('container')
    <section id="ubahMatriksSub" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center">
                    <h1 class="mb-5 text-dark text-5xl font-bold">
                        Ubah Daftar Perbandingan Sub Kriteria
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
                    @if ($kriteria == 'harga')
                        <form action="" method="post">
                            @csrf
                            <h3 class="mb-5 text-primary text-2xl font-semibold">Kriteria Harga</h3>
                            <input type="text" name="kriteria" id="kriteria" value="harga" hidden>
                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                @foreach ($skn2 as $skn)
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">{{ $skn->id_sub_kriteria_dari }} --> {{ $skn->id_sub_kriteria_tujuan }}:</span>
                                    </label>
                                    <input type="number" name="SKN002" id="SKN002" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $skn->nilai }}" required>
                                @endforeach
                            </div>

                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                @foreach ($skn3 as $skn)
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">{{ $skn->id_sub_kriteria_dari }} --> {{ $skn->id_sub_kriteria_tujuan }}:</span>
                                    </label>
                                    <input type="number" name="SKN003" id="SKN003" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $skn->nilai }}" required>
                                @endforeach
                            </div>

                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                @foreach ($skn6 as $skn)
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">{{ $skn->id_sub_kriteria_dari }} --> {{ $skn->id_sub_kriteria_tujuan }}:</span>
                                    </label>
                                    <input type="number" name="SKN006" id="SKN006" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $skn->nilai }}" required>
                                @endforeach
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-5">Ubah</button>
                            <a href="/dashboard/perbandingan/subKriteria" class="btn btn-secondary mt-5">Batal</a>
                        </form>

                    @elseif ($kriteria == 'jumlah_menu')
                        <form action="" method="post">
                            @csrf
                            <h3 class="mb-5 text-primary text-2xl font-semibold">Kriteria Jumlah Menu</h3>
                            <input type="text" name="kriteria" id="kriteria" value="jumlah_menu" hidden>
                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                @foreach ($skn11 as $skn)
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">{{ $skn->id_sub_kriteria_dari }} --> {{ $skn->id_sub_kriteria_tujuan }}:</span>
                                    </label>
                                    <input type="number" name="SKN011" id="SKN011" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $skn->nilai }}" required>
                                @endforeach
                            </div>

                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                @foreach ($skn12 as $skn)
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">{{ $skn->id_sub_kriteria_dari }} --> {{ $skn->id_sub_kriteria_tujuan }}:</span>
                                    </label>
                                    <input type="number" name="SKN012" id="SKN012" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $skn->nilai }}" required>
                                @endforeach
                            </div>

                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                @foreach ($skn15 as $skn)
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">{{ $skn->id_sub_kriteria_dari }} --> {{ $skn->id_sub_kriteria_tujuan }}:</span>
                                    </label>
                                    <input type="number" name="SKN015" id="SKN006" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $skn->nilai }}" required>
                                @endforeach
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-5">Ubah</button>
                            <a href="/dashboard/perbandingan/subKriteria" class="btn btn-secondary mt-5">Batal</a>
                        </form>

                    @elseif ($kriteria == 'popularitas')
                        <form action="" method="post">
                            @csrf
                            <h3 class="mb-5 text-primary text-2xl font-semibold">Kriteria Popularitas</h3>
                            <input type="text" name="kriteria" id="kriteria" value="popularitas" hidden>
                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                @foreach ($skn20 as $skn)
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">{{ $skn->id_sub_kriteria_dari }} --> {{ $skn->id_sub_kriteria_tujuan }}:</span>
                                    </label>
                                    <input type="number" name="SKN020" id="SKN020" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $skn->nilai }}" required>
                                @endforeach
                            </div>

                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                @foreach ($skn21 as $skn)
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">{{ $skn->id_sub_kriteria_dari }} --> {{ $skn->id_sub_kriteria_tujuan }}:</span>
                                    </label>
                                    <input type="number" name="SKN021" id="SKN003" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $skn->nilai }}" required>
                                @endforeach
                            </div>

                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                @foreach ($skn24 as $skn)
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">{{ $skn->id_sub_kriteria_dari }} --> {{ $skn->id_sub_kriteria_tujuan }}:</span>
                                    </label>
                                    <input type="number" name="SKN024" id="SKN006" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" value="{{ $skn->nilai }}" required>
                                @endforeach
                            </div>
                            
                            <button type="submit" class="btn btn-primary mt-5">Ubah</button>
                            <a href="/dashboard/perbandingan/subKriteria" class="btn btn-secondary mt-5">Batal</a>
                        </form>

                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
