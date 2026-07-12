<aside class="admin-sidebar">
    <div class="sidebar-logo">
        <h2>Admin Desa</h2>
    </div>

    <nav class="sidebar-menu">
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            Beranda
        </a>
        <a href="{{ route('admin.potensi.index') }}" class="{{ request()->routeIs('admin.potensi.*') ? 'active' : '' }}">
            Potensi Desa
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