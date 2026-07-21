<nav>
    <div class="nav-logo">
        <a href="{{ route('home') }}">Desa Resapombo</a>
    </div>
    <ul class="nav-links">
        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'active' : '' }}">Profile</a></li>
        <li><a href="{{ route('pemerintahan') }}" class="{{ request()->routeIs('pemerintahan') ? 'active' : '' }}">Pemerintahan</a></li>
        <li><a href="{{ route('potensi') }}" class="{{ request()->routeIs('potensi') ? 'active' : '' }}">Potensi</a></li>
        <li><a href="{{ route('bumdes') }}" class="{{ request()->routeIs('bumdes') ? 'active' : '' }}">BUMDes</a></li>
        <li><a href="{{ route('berita') }}" class="{{ request()->routeIs('berita') ? 'active' : '' }}">Berita</a></li>
        <li><a href="{{ route('layanan') }}" class="{{ request()->routeIs('layanan') ? 'active' : '' }}">Layanan</a></li>
    </ul>
</nav>