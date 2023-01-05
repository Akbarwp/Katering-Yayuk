@extends('layouts.main')

@section('container')
    <section id="pesanan" class="bg-light pb-36">
        <div class="container">
            <div class="w-full pt-32 px-6 text-dark font-sarabun">
                <h1 class="mb-5 text-5xl font-bold">Silakan Untuk Memesan</h1>
                <a href="/pesanan/manual" class="btn btn-primary">Pilih Manual</a>
                <a href="/pesanan/paket" class="btn btn-secondary">Pilih Rekomendasi Paket</a>
                <a href="/pesanan/rekomendasi" class="btn btn-accent">Pilih Sesuai Kebutuhan</a>
            </div>
        </div>
    </section>
@endsection
