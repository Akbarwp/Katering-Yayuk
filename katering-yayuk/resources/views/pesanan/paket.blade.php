@extends('layouts.main')

@section('container')
    <section id="homePaket" class="bg-light pb-36">
        <div class="container">
            <div class="w-full pt-32 px-6 text-dark font-sarabun">
                <h1 class="mb-5 text-5xl font-bold">Silakan Pilih Paket</h1>
                <a href="/pesanan" class="btn btn-primary">Kembali</a>
            </div>

            <div class="flex flex-wrap justify-center gap-5 mt-5">
                @foreach ($rekomendasi as $rekom)
                    <div class="w-1/5">
                        <div class="bg-primary rounded-xl shadow-lg overflow-hidden mb-10">
                            <div class="py-8 px-6 text-center">
                                <h3 class="mb-3 font-bold text-2xl text-light">{{ $rekom->nama }}</h3>
                                <p class="font-light text-base text-light">{{ $rekom->nasi }}</p>
                                <p class="font-light text-base text-light">{{ $rekom->lauk_utama }}</p>
                                <p class="font-light text-base text-light">{{ $rekom->lauk_pendamping1 }}</p>
                                <p class="font-light text-base text-light mb-4">{{ $rekom->lauk_pendamping2 }}</p>

                                <button class="btn btn-warning">Pesan</button>
                                {{-- <button class="btn btn-accent">Nilai: {{ $rekom->nilai }}</button> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
