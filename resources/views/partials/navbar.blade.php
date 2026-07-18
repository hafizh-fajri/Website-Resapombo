<nav>
    <div class="nav-logo">
        <a href="{{ route('home') }}">Desa Resapombo</a>
    </div>
    <ul class="nav-links">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
        <li><a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profil Desa</a></li>
        <li><a href="{{ route('struktur') }}" class="{{ request()->routeIs('struktur') ? 'active' : '' }}">Struktur Organisasi</a></li>
        <li><a href="{{ route('bumdes') }}" class="{{ request()->routeIs('bumdes') ? 'active' : '' }}">BUMDes</a></li>
        <li><a href="{{ route('layanan') }}" class="{{ request()->routeIs('layanan') ? 'active' : '' }}">Layanan</a></li>
    </ul>
</nav>