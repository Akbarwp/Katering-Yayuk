@extends('layouts.main')

@section('container')
    <section id="rekomendasi" class="bg-light pb-36">
        <div class="container">
            <div class="w-full pt-32 px-6 text-dark font-sarabun">
                <h1 class="mb-5 text-5xl font-bold">Silakan Pilih Prioritas Anda</h1>
                <div class="w-full px-4 mx-auto">
                    <div class="mx-auto text-center">
                        <form action="" method="post">
                            @csrf
                            @foreach ($kriteria as $kri)
                                <div class="form-control w-full max-w-lg mx-auto mb-5">
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">{{ $kri->nama }}:</span>
                                    </label>
                                    <select name="{{ Str::of($kri->nama)->lower()->replace(' ', '_') }}" id="{{ Str::of($kri->nama)->lower()->replace(' ', '_') }}" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" required>
                                        <option>Pilih Prioritas!</option>
                                        @foreach ($subKriteria as $sk)
                                            <option value="{{ $sk->nama }}">
                                                @if ($sk->nama == 'Baik')
                                                    Penting
                                                @elseif ($sk->nama == 'Cukup')
                                                    Biasa
                                                @elseif ($sk->nama == 'Kurang')
                                                    Tidak Penting
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                            <button class="btn btn-warning hover:bg-opacity-80" type="submit">Pilih</button>
                            <a href="{{ url('/pesanan') }}"
                                class="btn border-0 bg-slate-300 text-dark hover:bg-slate-400">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
