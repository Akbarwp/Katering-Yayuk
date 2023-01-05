@extends('dashboard.layouts.main')

@section('container')
    <section id="tambahSubKriteria" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center mb-16">
                    <h1 class="mb-5 flex justify-center text-dark text-5xl font-bold">Tambah Paket</h1>
                </div>
            </div>

            <div class="w-full px-4 mx-auto">
                <div class="mx-auto text-center">
                    <form action="" method="post">
                        @csrf
                        <div class="form-control w-full max-w-lg mx-auto mb-5">
                            <label class="label">
                                <span class="label-text text-primary font-bold text-xl">ID:</span>
                            </label>
                            <input type="text" name="id" placeholder="Type here"
                                class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                required />
                        </div>
                        <div class="form-control w-full max-w-lg mx-auto mb-5">
                            <label class="label">
                                <span class="label-text text-primary font-bold text-xl">Nama:</span>
                            </label>
                            <input type="text" name="nama" placeholder="Type here"
                                class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                required />
                        </div>
                        <div class="form-control w-full max-w-lg mx-auto mb-5">
                            <label class="label">
                                <span class="label-text text-primary font-bold text-xl">Nasi:</span>
                            </label>
                            <select name="nasi" id="nasi" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" required>
                                <option>Pilih Jenis Nasi!</option>
                                @foreach ($nasi as $nas)
                                    <option value="{{ $nas->nama }}">{{ $nas->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-control w-full max-w-lg mx-auto mb-5">
                            <label class="label">
                                <span class="label-text text-primary font-bold text-xl">Lauk Utama:</span>
                            </label>
                            <select name="lauk_utama" id="nasi" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" required>
                                <option>Pilih Lauk Utama!</option>
                                @foreach ($lauk_utama as $lu)
                                    <option value="{{ $lu->nama }}">{{ $lu->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-control w-full max-w-lg mx-auto mb-5">
                            <label class="label">
                                <span class="label-text text-primary font-bold text-xl">Lauk Pendamping 1:</span>
                            </label>
                            <select name="lauk_pendamping1" id="nasi" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" required>
                                <option>Pilih Lauk Pendamping!</option>
                                @foreach ($lauk_pendamping as $lp)
                                    <option value="{{ $lp->nama }}">{{ $lp->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-control w-full max-w-lg mx-auto mb-5">
                            <label class="label">
                                <span class="label-text text-primary font-bold text-xl">Lauk Pendamping 2:</span>
                            </label>
                            <select name="lauk_pendamping2" id="nasi" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" required>
                                <option>Pilih Lauk Pendamping!</option>
                                @foreach ($lauk_pendamping as $lp)
                                    <option value="{{ $lp->nama }}">{{ $lp->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-warning hover:bg-opacity-80" type="submit">Tambah</button>
                        <a href="{{ url('dashboard/paket') }}"
                            class="btn border-0 bg-slate-300 text-dark hover:bg-slate-400">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
