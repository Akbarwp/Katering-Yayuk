@extends('dashboard.layouts.main')

@section('container')
    <section id="ubahAlternatif" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center mb-16">
                    <h1 class="mb-5 flex justify-center text-dark text-5xl font-bold">Ubah Alternatif</h1>
                </div>
            </div>

            <div class="w-full px-4 mx-auto">
                <div class="mx-auto text-center">
                    @foreach ($alternatif as $alt)
                        <form action="" method="post">
                            @csrf
                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                <label class="label">
                                    <span class="label-text text-primary font-bold text-xl">ID:</span>
                                </label>
                                <input type="text" name="id" placeholder="Type here"
                                    class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                    value="{{ $alt->id }}" readonly />
                            </div>
                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                <label class="label">
                                    <span class="label-text text-primary font-bold text-xl">Paket:</span>
                                </label>
                                <select name="paket" id="paket" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" required>
                                    <option>Pilih Paket!</option>
                                    @foreach ($paket as $pkt)
                                        <option @if ($alt->paket == $pkt->nama) @selected(true) @endif value="{{ $pkt->nama }}">{{ $pkt->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @foreach ($kriteria as $kri)
                                <div class="form-control w-full max-w-lg mx-auto mb-5">
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">{{ $kri->nama }}:</span>
                                    </label>
                                    <select name="{{ Str::of($kri->nama)->lower()->replace(' ', '_') }}" id="{{ Str::of($kri->nama)->lower()->replace(' ', '_') }}" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" required>
                                        <option>Pilih Sub Kriteria!</option>
                                        @foreach ($subKriteria as $sk)
                                            <option 
                                            @if ($alt->{Str::of($kri->nama)->lower()->replace(' ', '_')} == $sk->nama) 
                                                @selected(true)
                                            @endif 
                                            value="{{ $sk->nama }}">{{ $sk->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                            <button class="btn btn-warning hover:bg-opacity-80" type="submit">Ubah</button>
                            <a href="{{ url('dashboard/alternatif') }}"
                                class="btn border-0 bg-slate-300 text-dark hover:bg-slate-400">Batal</a>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
