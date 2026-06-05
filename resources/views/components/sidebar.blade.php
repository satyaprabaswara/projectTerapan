<aside class="bg-white border-end shadow-sm"
       style="width:220px; min-height:100vh;">

    <nav class="pt-3">

        <a href="{{ route('dashboard') }}"
           class="d-block px-4 py-3 text-decoration-none {{ request()->routeIs('dashboard') ? 'bg-primary text-white' : 'text-dark' }}">
            📊 Dashboard
        </a>

        <a href="{{ route('document.index') }}"
           class="d-block px-4 py-3 text-decoration-none {{ request()->routeIs('document.*') ? 'bg-primary text-white' : 'text-dark' }}">
            📁 Kelola Dokumen
        </a>

        @php($role = Auth::user()?->role ?? '')

        @if($role === 'admin')
            <a href="{{ route('categories.index') }}"
               class="d-block px-4 py-3 text-decoration-none {{ request()->routeIs('categories.*') ? 'bg-primary text-white' : 'text-dark' }}">
                📂 Kategori
            </a>

            <a href="{{ route('users.index') }}"
               class="d-block px-4 py-3 text-decoration-none {{ request()->routeIs('users.*') ? 'bg-primary text-white' : 'text-dark' }}">
                👤 Pengguna
            </a>
        @endif


        <a href="#"
           class="d-block px-4 py-3 text-decoration-none text-dark">
            📝 Log Aktivitas
        </a>



    </nav>

</aside>