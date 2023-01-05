@extends('layouts.main')

@section('container')
    <section id="login" class="bg-light pb-36">
        <div class="container">
            <div class="w-full pt-36 px-6 text-dark font-sarabun">
                <div class="flex justify-center mb-16">
                    <h1 class="text-5xl font-bold">Login</h1>
                </div>

                @if (session()->has('success'))
                    <div class="alert alert-success shadow-lg w-96 mx-auto mb-4">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"/></svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif
                @if (session()->has('loginError'))
                    <div class="alert alert-error shadow-lg w-96 mx-auto mb-4">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>{{ session('loginError') }}</span>
                        </div>
                    </div>
                @endif

                <div class="flex justify-center">
                    <form action="" method="post">
                        @csrf
                        <div class="form-control mb-2">
                            <label class="input-group">
                                <span class="text-light">Email</span>
                                <input type="email" name="email" placeholder="example@site.com" class="input input-bordered text-light w-96 bg-primary" />
                            </label>
                        </div>
                        <div class="form-control mb-5">
                            <label class="input-group">
                                <span class="text-light">Password</span>
                                <input type="password" name="password" placeholder="yourPassowrd" class="input input-bordered text-light w-full bg-primary" />
                            </label>
                        </div>
                        <button type="submit" class="btn w-full border-0 bg-secondary text-dark hover:bg-secondary hover:bg-opacity-70">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
