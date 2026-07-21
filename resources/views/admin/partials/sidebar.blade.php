<aside class="admin-sidebar">
    <div class="sidebar-logo">
        <h2>Admin Desa</h2>
    </div>

    <nav class="sidebar-menu">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            Home
        </a>
        <a href="{{ route('admin.profil.index') }}" class="{{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
            Profile
        </a>
        <a href="{{ route('admin.jabatan.index') }}" class="{{ request()->routeIs('admin.jabatan.*') ? 'active' : '' }}">
            Jabatan
        </a>
        <a href="{{ route('admin.perangkat.index') }}" class="{{ request()->routeIs('admin.perangkat.*') ? 'active' : '' }}">
            Perangkat
        </a>
        <a href="{{ route('admin.potensi.index') }}" class="{{ request()->routeIs('admin.potensi.*') ? 'active' : '' }}">
            Potensi
        </a>
        <a href="{{ route('admin.bumdes.index') }}" class="{{ request()->routeIs('admin.bumdes.*') ? 'active' : '' }}">
            BUMDes
        </a>
        <a href="{{ route('admin.artikel.index') }}" class="{{ request()->routeIs('admin.artikel.*') || request()->routeIs('admin.kategori-berita.*') ? 'active' : '' }}">
            Berita
        </a>
        <a href="{{ route('admin.layanan.index') }}" class="{{ request()->routeIs('admin.layanan.*') ? 'active' : '' }}">
            Pelayanan
        </a>
    </nav>

    <div class="sidebar-footer">
        <p>Login sebagai: {{ auth()->user()->name }}</p>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</aside>