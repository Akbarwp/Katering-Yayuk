@extends('dashboard.layouts.main')

@section('container')
    <section id="ubahMenu" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center mb-16">
                    <h1 class="mb-5 flex justify-center text-dark text-5xl font-bold">Ubah {{ $h1 }}</h1>
                </div>
            </div>

            @if ($kode == 'nasi')
                <div class="w-full px-4 mx-auto">
                    <div class="mx-auto text-center">
                        @foreach ($nasi as $nas)
                            <form action="" method="post">
                                @csrf
                                <input type="text" name="kode" value="nasi" hidden>
                                <div class="form-control w-full max-w-lg mx-auto mb-5">
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">ID:</span>
                                    </label>
                                    <input type="text" name="id" placeholder="Type here"
                                        class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                        value="{{ $nas->id }}" readonly />
                                </div>
                                <div class="form-control w-full max-w-lg mx-auto mb-5">
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">Nama:</span>
                                    </label>
                                    <input type="text" name="nama" placeholder="Type here"
                                        class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                        value="{{ $nas->nama }}" />
                                </div>
                                <div class="form-control w-full max-w-lg mx-auto mb-5">
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">Harga:</span>
                                    </label>
                                    <input type="number" name="harga" placeholder="Type here"
                                        class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                        value="{{ $nas->harga }}" />
                                </div>
                                <button class="btn btn-warning hover:bg-opacity-80" type="submit">Perbarui</button>
                                <a href="{{ url('dashboard/menu') }}"
                                    class="btn border-0 bg-slate-300 text-dark hover:bg-slate-400">Batal</a>
                            </form>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($kode == 'lauk_utama')
                <div class="w-full px-4 mx-auto">
                    <div class="mx-auto text-center">
                        @foreach ($lauk_utama as $lu)
                            <form action="" method="post">
                                @csrf
                                <input type="text" name="kode" value="lauk_utama" hidden>
                                <div class="form-control w-full max-w-lg mx-auto mb-5">
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">ID:</span>
                                    </label>
                                    <input type="text" name="id" placeholder="Type here"
                                        class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                        value="{{ $lu->id }}" readonly />
                                </div>
                                <div class="form-control w-full max-w-lg mx-auto mb-5">
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">Nama:</span>
                                    </label>
                                    <input type="text" name="nama" placeholder="Type here"
                                        class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                        value="{{ $lu->nama }}" />
                                </div>
                                <div class="form-control w-full max-w-lg mx-auto mb-5">
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">Harga:</span>
                                    </label>
                                    <input type="number" name="harga" placeholder="Type here"
                                        class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                        value="{{ $lu->harga }}" />
                                </div>
                                <button class="btn btn-warning hover:bg-opacity-80" type="submit">Perbarui</button>
                                <a href="{{ url('dashboard/menu') }}"
                                    class="btn border-0 bg-slate-300 text-dark hover:bg-slate-400">Batal</a>
                            </form>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($kode == 'lauk_pendamping')
                <div class="w-full px-4 mx-auto">
                    <div class="mx-auto text-center">
                        @foreach ($lauk_pendamping as $lp)
                            <form action="" method="post">
                                @csrf
                                <input type="text" name="kode" value="lauk_pendamping" hidden>
                                <div class="form-control w-full max-w-lg mx-auto mb-5">
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">ID:</span>
                                    </label>
                                    <input type="text" name="id" placeholder="Type here"
                                        class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                        value="{{ $lp->id }}" readonly />
                                </div>
                                <div class="form-control w-full max-w-lg mx-auto mb-5">
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">Nama:</span>
                                    </label>
                                    <input type="text" name="nama" placeholder="Type here"
                                        class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                        value="{{ $lp->nama }}" />
                                </div>
                                <div class="form-control w-full max-w-lg mx-auto mb-5">
                                    <label class="label">
                                        <span class="label-text text-primary font-bold text-xl">Harga:</span>
                                    </label>
                                    <input type="number" name="harga" placeholder="Type here"
                                        class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                        value="{{ $lp->harga }}" />
                                </div>
                                <button class="btn btn-warning hover:bg-opacity-80" type="submit">Perbarui</button>
                                <a href="{{ url('dashboard/menu') }}"
                                    class="btn border-0 bg-slate-300 text-dark hover:bg-slate-400">Batal</a>
                            </form>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
