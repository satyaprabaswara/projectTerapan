<style>
.sidebar {
    width: 220px;
    min-height: 100vh;
    background: #ffffff;
    border-right: 1px solid #e5e7eb;
}

.sidebar-menu {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 22px;
    text-decoration: none;
    color: #4b5563;
    font-size: 15px;
    font-weight: 500;
    transition: all .3s ease;
}

.sidebar-menu:hover {
    background: #f3f4f6;
    color: #2563eb;
}

.sidebar-menu.active {
    background: #2563eb;
    color: white;
}

.sidebar-menu i {
    font-size: 16px;
}

.logout-btn {
    width: 100%;
    border: none;
    background: none;
    text-align: left;
}
</style>

<aside class="sidebar">

    <nav class="pt-3">

        <a href="{{ route('dashboard') }}"
           class="sidebar-menu {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <a href="{{ route('document.index') }}"
           class="sidebar-menu {{ request()->routeIs('document.*') ? 'active' : '' }}">
            <i class="bi bi-folder-fill"></i>
            Kelola Dokumen
        </a>

        <a href="{{ route('categories.index') }}"
           class="sidebar-menu {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-text"></i>
            Kategori
        </a>

        <a href="{{ route('users.index') }}"
           class="sidebar-menu {{ request()->routeIs('users.*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i>
            Pengguna
        </a>

        <a href="#"
           class="sidebar-menu">
            <i class="bi bi-clock-history"></i>
            Log Aktivitas
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="sidebar-menu logout-btn text-danger">

                <i class="bi bi-box-arrow-right"></i>
                Logout

            </button>

        </form>

    </nav>

</aside>
