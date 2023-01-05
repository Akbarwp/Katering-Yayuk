<header class="navbar bg-primary text-light font-sarabun">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            {{-- Awal Navbar responsive --}}
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li><a>Item 1</a></li>
                <li><a>Item 2</a></li>
                <li><a>Item 3</a></li>
            </ul>
            {{-- Akhir Navbar responsive --}}
        </div>
        <a class="btn btn-ghost normal-case ml-52 text-xl font-kurenaido" href="{{ url('dashboard') }}">Dashboard Katering Yayuk</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        {{-- Awal Navbar Web --}}
        <ul class="menu menu-horizontal px-1">
            <li tabindex="0">
                <a>
                    Daftar
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                </a>
                <ul class="p-2">
                    <li><a href="{{ url('/dashboard/menu') }}" class="bg-primary text-light hover:bg-dark">Daftar Menu</a></li>
                    <li><a href="{{ url('/dashboard/paket') }}" class="bg-primary text-light hover:bg-dark">Daftar Paket</a></li>
                    <li><a href="{{ url('/dashboard/rekomendasi') }}" class="bg-primary text-light hover:bg-dark">Daftar Rekomendasi</a></li>
                </ul>
            </li>
            <li tabindex="0">
                <a>
                    Kriteria
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                </a>
                <ul class="p-2">
                    <li><a href="{{ url('/dashboard/kriteria') }}" class="bg-primary text-light hover:bg-dark">Kriteria</a></li>
                    <li><a href="{{ url('/dashboard/subkriteria') }}" class="bg-primary text-light hover:bg-dark">Sub Kriteria</a></li>
                </ul>
            </li>
            <li tabindex="0">
                <a>
                    Perhitungan
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                </a>
                <ul class="p-2">
                    <li><a href="{{ url('/dashboard/alternatif') }}" class="bg-primary text-light hover:bg-dark">Alternatif</a></li>
                    <li><a href="{{ url('/dashboard/perbandingan') }}" class="bg-primary text-light hover:bg-dark">Perbandingan</a></li>
                    <li><a href="{{ url('/dashboard/ahp') }}" class="bg-primary text-light hover:bg-dark">Hasil AHP</a></li>
                </ul>
            </li>
        </ul>
        {{-- Akhir Navbar Web --}}
    </div>
    <div class="navbar-end">
        <a href="{{ url('logout') }}" onclick="return confirm('Are you sure?')" class="btn mr-2 bg-light hover:bg-dark text-dark hover:text-light font-bold border-0">Logout</a>
    </div>
</header>
