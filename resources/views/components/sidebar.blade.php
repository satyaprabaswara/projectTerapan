<style>
    /* Sticky sidebar kaku, stabil, dan konsisten */
    .sidebar {
        width: 220px;
        min-width: 220px;
        max-width: 220px;
        min-height: 100vh;
        background: #ffffff;
        border-right: 1px solid #e5e7eb;
        transition: all .3s ease;
        overflow: hidden;
        flex-shrink: 0; /* Mengunci layout agar tidak bisa digencet oleh tabel data */
    }

    /* Saat sidebar dikecilkan, ukurannya dikunci mati di 70px */
    .sidebar.collapsed {
        width: 70px;
        min-width: 70px;
        max-width: 70px;
    }

    .sidebar-menu {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 22px;
        text-decoration: none;
        color: #475569;
        font-size: 15px;
        font-weight: 500;
        transition: .3s;
        white-space: nowrap; /* Mencegah teks menu patah ke bawah saat animasi mengecil */
    }

    .sidebar-menu i {
        font-size: 18px;
        min-width: 20px;
        flex-shrink: 0;
    }

    .sidebar-menu:hover {
        background: #eff6ff;
        color: #2563eb;
    }

    /* Warna biru aktif kaku (anteb) */
    .sidebar-menu.active {
        background: #2563eb !important;
        color: #fff !important;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    .logout-btn {
        width: 100%;
        border: none;
        background: none;
        text-align: left;
    }

    .sidebar.collapsed .menu-text {
        display: none;
    }

    .sidebar.collapsed .sidebar-menu {
        justify-content: center;
        padding-left: 0;
        padding-right: 0;
    }

    .sidebar.collapsed .sidebar-menu i {
        margin: 0;
        font-size: 20px;
    }
    
    /* Posisi tombol hamburger menu di dalam sidebar */
    #sidebarToggle {
        margin: 15px 15px 10px 22px;
        padding: 0;
        color: #475569;
    }
    .sidebar.collapsed #sidebarToggle {
        margin: 15px auto 10px auto;
        display: block;
    }
</style>

<aside class="sidebar" id="sidebar">

    <button id="sidebarToggle" class="btn border-0">
        <i class="bi bi-list fs-3"></i>
    </button>

    <nav class="pt-2">
        <a href="{{ route('dashboard') }}"
           class="sidebar-menu {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span class="menu-text">Dashboard</span>
        </a>

        <a href="{{ route('document.index') }}"
           class="sidebar-menu {{ request()->routeIs('document.index') || (request()->routeIs('document.*') && !request()->routeIs('document.trash') && !request()->is('*trash*')) ? 'active' : '' }}">
            <i class="bi bi-folder-fill"></i>
            <span class="menu-text">Kelola Dokumen</span>
        </a>

        @if(Auth::check() && strtolower(trim((string)Auth::user()->role)) !== 'viewer')
            <a href="{{ route('categories.index') }}"
               class="sidebar-menu {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-text"></i>
                <span class="menu-text">Kategori</span>
            </a>

            <a href="{{ route('users.index') }}"
               class="sidebar-menu {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i>
                <span class="menu-text">Pengguna</span>
            </a>
        @endif

        <a href="{{ route('activity.logs') }}"
           class="sidebar-menu {{ request()->routeIs('activity.logs') ? 'active' : '' }}">
            <i class="bi bi-clock-history"></i>
            <span class="menu-text">Log Aktivitas</span>
        </a>

        <a href="{{ route('document.trash') }}"
           class="sidebar-menu {{ request()->routeIs('document.trash') || request()->is('*trash*') ? 'active' : '' }}">
            <i class="bi bi-trash"></i>
            <span class="menu-text">Sampah</span>
        </a>
    </nav>
</aside>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('sidebarToggle');

    if(toggle && sidebar) {
        // 1. Baca data ingatan ukuran sidebar dari Google Chrome / Safari user
        const isCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
        
        // 2. Jika di ingatan berstatus true, langsung kempiskan sejak awal muat halaman
        if (isCollapsed) {
            sidebar.classList.add('collapsed');
        } else {
            sidebar.classList.remove('collapsed');
        }

        // 3. Logika mendengarkan klik pada tombol garis tiga
        toggle.addEventListener('click', function(){
            sidebar.classList.toggle('collapsed');
            
            // Catat status ukuran terbaru (lebar/kempis) ke ingatan browser
            const statusSekarang = sidebar.classList.contains('collapsed');
            localStorage.setItem('sidebar-collapsed', statusSekarang);
        });
    }
});
</script>