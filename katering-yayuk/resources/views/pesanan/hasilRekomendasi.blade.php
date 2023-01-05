@extends('layouts.main')

@section('container')
    <section id="hasilRekomendasi" class="bg-light pb-36">
        <div class="container">
            <div class="w-full pt-32 px-6 text-dark font-sarabun">
                <h1 class="mb-5 text-5xl font-bold">Silakan Pilih Pesanan Anda</h1>
                <a href="/pesanan/rekomendasi" class="btn btn-primary mb-3">Kembali</a>
                <button class="btn btn-accent mb-3 ml-2">Hasil Perhitungan: {{ $hasill }}</button>
            </div>

            <div class="flex flex-wrap justify-center gap-5">
                @foreach ($hasil as $hs)
                    <div class="w-1/5">
                        <div class="bg-primary rounded-xl shadow-lg overflow-hidden mb-10">
                            <div class="py-8 px-6 text-center">
                                <h3 class="mb-3 font-bold text-3xl text-secondary">{{ $hs->nama }}</h3>
                                <p class="font-light text-lg text-light">{{ $hs->nasi }}</p>
                                <p class="font-light text-lg text-light">{{ $hs->lauk_utama }}</p>
                                <p class="font-light text-lg text-light">{{ $hs->lauk_pendamping1 }}</p>
                                <p class="font-light text-lg text-light mb-4">{{ $hs->lauk_pendamping2 }}</p>

                                <button class="btn btn-warning font-bold">Pesan</button>
                                <button class="btn btn-accent font-semibold">Nilai: {{ $hs->jumlah }}</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
