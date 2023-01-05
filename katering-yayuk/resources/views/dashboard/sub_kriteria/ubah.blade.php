@extends('dashboard.layouts.main')

@section('container')
    <section id="ubahSubKriteria" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center mb-16">
                    <h1 class="mb-5 flex justify-center text-dark text-5xl font-bold">Ubah Sub Kriteria</h1>
                </div>
            </div>

            <div class="w-full px-4 mx-auto">
                <div class="mx-auto text-center">
                    @foreach ($subKriteria as $sk)
                        <form action="" method="post">
                            @csrf
                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                <label class="label">
                                    <span class="label-text text-primary font-bold text-xl">ID:</span>
                                </label>
                                <input type="text" name="id" placeholder="Type here"
                                    class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                    value="{{ $sk->id }}" readonly />
                            </div>
                            <div class="form-control w-full max-w-lg mx-auto mb-5">
                                <label class="label">
                                    <span class="label-text text-primary font-bold text-xl">Nama:</span>
                                </label>
                                <input type="text" name="nama" placeholder="Type here"
                                    class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                    value="{{ $sk->nama }}" />
                            </div>
                            <button class="btn btn-warning hover:bg-opacity-80" type="submit">Perbarui</button>
                            <a href="{{ url('dashboard/subkriteria') }}"
                                class="btn border-0 bg-slate-300 text-dark hover:bg-slate-400">Batal</a>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
