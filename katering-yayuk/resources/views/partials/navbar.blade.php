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
        <a class="btn btn-ghost normal-case ml-52 text-xl font-kurenaido" href="{{ url('/') }}">Katering Yayuk</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        {{-- Awal Navbar Web --}}
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ url('/menu') }}">Daftar Menu</a></li>
            <li><a href="{{ url('/pesanan') }}">Pesanan</a></li>
            <li><a>Item 3</a></li>
        </ul>
        {{-- Akhir Navbar Web --}}
    </div>
    <div class="navbar-end">
        {{-- <a href="{{ url('login') }}" class="btn mr-2 bg-light hover:bg-dark text-dark hover:text-light font-bold border-0">Login</a> --}}
        {{-- <a href="{{ url('register') }}" class="btn mr-2 bg-light hover:bg-dark text-dark hover:text-light font-bold border-0">Register</a> --}}
    </div>
</header>
