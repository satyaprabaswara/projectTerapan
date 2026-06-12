<style>
/* Sticky sidebar butuh kontainer utama tidak mengganggu sticky */
    .sidebar{
    width:220px;
    min-width:220px;
    min-height:100vh;
    background:#fff;
    border-right:1px solid #e5e7eb;
    transition:all .3s ease;
    overflow:hidden;
}

.sidebar.collapsed{
    width:70px;
    min-width:70px;
}

.sidebar-menu{
    display:flex;
    align-items:center;
    gap:12px;
    padding:14px 22px;
    text-decoration:none;
    color:#475569;
    font-size:15px;
    font-weight:500;
    transition:.3s;
}

.sidebar-menu i{
    font-size:18px;
    min-width:20px;
}

.sidebar-menu:hover{
    background:#eff6ff;
    color:#2563eb;
}

.sidebar-menu.active{
    background:#2563eb;
    color:#fff !important;
}

.logout-btn{
    width:100%;
    border:none;
    background:none;
    text-align:left;
}

.sidebar.collapsed .menu-text{
    display:none;
}

.sidebar.collapsed .sidebar-menu{
    justify-content:center;
    padding-left:0;
    padding-right:0;
}

.sidebar.collapsed .sidebar-menu i{
    margin:0;
    font-size:20px;
}
</style>

<aside class="sidebar" id="sidebar">

    <button
        id="sidebarToggle"
        class="btn border-0 me-3">
        <i class="bi bi-list fs-3"></i>
    </button>

    <nav class="pt-3">

        <a href="{{ route('dashboard') }}"
        class="sidebar-menu {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span class="menu-text">Dashboard</span>
        </a>

        <a href="{{ route('document.index') }}"
        class="sidebar-menu {{ request()->routeIs('document.*') ? 'active' : '' }}">
            <i class="bi bi-folder-fill"></i>
            <span class="menu-text">Kelola Dokumen</span>
        </a>

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

       <a href="{{ route('activity.logs') }}"
        class="sidebar-menu {{ request()->routeIs('activity.logs') ? 'active' : '' }}">
            <i class="bi bi-clock-history"></i>
            <span class="menu-text">Log Aktivitas</span>
        </a>

        <a href="{{ route('document.trash') }}"
        class="sidebar-menu {{ request()->routeIs('document.trash') ? 'active' : '' }}">
            <i class="bi bi-trash"></i>
            <span class="menu-text">Sampah</span>
        </a>
    </nav>
</aside>

<script>
document.addEventListener('DOMContentLoaded', function(){

    const sidebar =
        document.getElementById('sidebar');

    const toggle =
        document.getElementById('sidebarToggle');

    toggle.addEventListener('click', function(){

        sidebar.classList.toggle('collapsed');

    });

});
</script>