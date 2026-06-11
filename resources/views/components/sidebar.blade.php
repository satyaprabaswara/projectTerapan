<style>
/* Sticky sidebar butuh kontainer utama tidak mengganggu sticky */
.sidebar {
        width: 220px;
        min-height: 100vh;
        background: #ffffff;
        border-right: 1px solid #e5e7eb;
        position: sticky;
        top: 70px; /* offset dari navbar */
        z-index: 20;
        height: calc(100vh - 70px);
    }

    .sidebar-logo {
        padding: 24px 22px 10px;
        border-bottom: 1px solid #f1f5f9;
        margin-bottom: 10px;
    }

    .sidebar-logo h4 {
        font-size: 20px;
        font-weight: 700;
        margin: 0;
        color: #111827;
    }

    .sidebar-logo p {
        font-size: 13px;
        color: #6b7280;
        margin-top: 4px;
        margin-bottom: 0;
    }

    .sidebar-menu {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 22px;
        margin: 4px 12px;
        border-radius: 12px;
        text-decoration: none;
        color: #4b5563;
        font-size: 15px;
        font-weight: 500;
        transition: all .3s ease;
    }

    .sidebar-menu:hover {
        background: #eff6ff;
        color: #2563eb;
    }

    .sidebar-menu.active {
        background: #2563eb;
        color: white !important; /* Memastikan teks tetap putih saat aktif */
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    .logout-btn {
        width: calc(100% - 24px);
        border: none;
        background: none;
        text-align: left;
    }

    .logout-btn:hover {
        background: #fef2f2;
        color: #dc2626 !important;
    }
</style>

<aside class="sidebar">
    <nav class="pt-2">

        <a href="{{ route('dashboard') }}"
           class="sidebar-menu {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            📊 Dashboard
        </a>

        <a href="{{ route('document.index') }}"
           class="sidebar-menu {{ (request()->routeIs('document.*') && !request()->routeIs('document.trash')) ? 'active' : '' }}">
            📁 Kelola Dokumen
        </a>

        <a href="{{ route('categories.index') }}"
           class="sidebar-menu {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            📂 Kategori
        </a>

        <a href="{{ route('users.index') }}"
           class="sidebar-menu {{ request()->routeIs('users.*') ? 'active' : '' }}">
            👤 Pengguna
        </a>

        <a href="{{ route('activity.logs') }}"
           class="sidebar-menu {{ request()->routeIs('activity.logs') ? 'active' : '' }}">
            📝 Log Aktivitas
        </a>

        <a href="{{ route('document.trash') }}"
           class="sidebar-menu {{ request()->routeIs('document.trash') ? 'active' : '' }}">
            🗑️ Sampah
        </a>
    </nav>
</aside>