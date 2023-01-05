@extends('dashboard.layouts.main')

@section('container')
    <section id="tambahRekomendasi" class="bg-light pb-36">
        <div class="container font-sarabun">
            <div class="w-full pt-16 px-6">
                <div class="mx-auto text-center mb-16">
                    <h1 class="mb-5 flex justify-center text-dark text-5xl font-bold">Tambah Rekomendasi</h1>
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
                            <input type="text" name="id" id="id" placeholder="Type here"
                                class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary"
                                required />
                        </div>
                        <div class="form-control w-full max-w-lg mx-auto mb-5">
                            <label class="label">
                                <span class="label-text text-primary font-bold text-xl">Paket:</span>
                            </label>
                            <select name="paket" id="paket" class="input input-bordered w-full max-w-lg border-0 bg-dark text-light hover:bg-primary" required>
                                <option>Pilih Paket!</option>
                                @foreach ($paket as $pkt)
                                    <option value="{{ $pkt->id }}">{{ $pkt->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-warning hover:bg-opacity-80" type="submit">Tambah</button>
                        <a href="{{ url('/dashboard/rekomendasi') }}"
                            class="btn border-0 bg-slate-300 text-dark hover:bg-slate-400">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
