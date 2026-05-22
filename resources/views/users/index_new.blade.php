<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Pengguna</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{ font-family:'Segoe UI',sans-serif; }
    .page-title{ font-size:36px; font-weight:700; color:#1e293b; }
    .sub-title{ color:#64748b; font-size:15px; }
    .main-card{ border:none; border-radius:22px; overflow:hidden; box-shadow:0 10px 35px rgba(0,0,0,.08); background:white; }
    .badge-category{ background:#dbeafe; color:#2563eb; padding:8px 16px; border-radius:30px; font-weight:600; }
    .btn-view{ background:#0ea5e9; color:white; border:none; border-radius:10px; padding:8px 14px; }
    .btn-download{ background:#22c55e; color:white; border:none; border-radius:10px; padding:8px 14px; }
    .btn-delete{ background:#ef4444; color:white; border:none; border-radius:10px; padding:8px 14px; }
    .empty-state{ padding:40px; text-align:center; color:#94a3b8; }

    /* samakan search bar seperti halaman dokumen */
    .search-box{
        border-radius:16px;
        overflow:hidden;
        background:white;
        box-shadow:0 4px 12px rgba(0,0,0,.05);
    }

    .search-box input{
        border:none;
        padding:15px;
    }

    .w-64{ width: 16rem; }

    /* header table */
    .table thead{ background:#0f172a; color:white; }
    .table thead th{ border:none; padding:18px; text-align:center; }
    .table tbody td{ padding:20px; vertical-align:middle; }
    .table tbody tr:hover{ background:#f8fafc; }
</style>

<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        <aside class="w-64 min-h-screen bg-white shadow-lg">
            <div class="p-6 border-b">
                <h1 class="text-2xl font-bold text-blue-700">PT SPR Langgak</h1>
                <p class="text-sm text-gray-500">Sistem Dokumentasi Finance</p>
            </div>

            <nav class="mt-6 flex flex-col">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-6 py-3 no-underline {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    📊 Dashboard
                </a>

                <a href="{{ route('document.index') }}"
                   class="flex items-center px-6 py-3 no-underline {{ request()->routeIs('document.index') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    📁 Kelola Dokumen
                </a>

                <a href="{{ route('categories.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl no-underline {{ request()->routeIs('categories.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    📂 Kategori
                </a>


                <a href="{{ route('users.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl no-underline {{ request()->routeIs('users.index') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    👤 Pengguna
                </a>

                <a href="#"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-100 no-underline">
                    📝 Log Aktivitas
                </a>

                <form method="POST" action="{{ route('logout') }}" class="">
                    @csrf
                    <button class="w-full text-left px-6 py-3 text-red-500 hover:bg-red-100">
                        🚪 Logout
                    </button>
                </form>
            </nav>
        </aside>

        <main class="flex-1 p-6">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <div>
                    <h1 class="page-title">👤 Pengguna</h1>
                    <p class="sub-title">Kelola akses dan data user</p>
                </div>

                @if(Auth::check() && (Auth::user()->role ?? '') === 'admin')
                    <a href="{{ route('users.create') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm fw-semibold">
                        + Buat Pengguna Baru
                    </a>
                @endif
            </div>

                <div class="card-body p-4">
                    <form method="GET" action="{{ route('users.index') }}" class="mb-0">
                        <div class="input-group search-box">
                            <input type="text" name="search" class="form-control" placeholder="🔍 Cari pengguna..." value="{{ request('search') }}">
                            <button class="btn btn-primary px-4" type="submit">Cari</button>
                        </div>
                    </form>
                </div>


            <div class="card main-card">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $index => $u)
                                    <tr>
                                        <td class="text-center fw-bold">{{ $users->firstItem() + $index }}</td>
                                        <td class="fw-semibold">{{ $u->name }}</td>
                                        <td class="text-center">{{ $u->email }}</td>
                                        <td class="text-center">
                                            @if(($u->role ?? '') === 'admin')
                                                <span class="badge-category">admin</span>
                                            @else
                                                <span class="badge-category" style="background:#f3f4f6; color:#374151;">viewer</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(Auth::check() && (Auth::user()->role ?? '') === 'admin')
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ route('users.edit', $u->id) }}" class="btn btn-view">✏️ Edit</a>
                                                    <form action="{{ route('users.destroy', $u->id) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-delete">🗑 Hapus</button>
                                                    </form>
                                                </div>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="empty-state">Belum ada user.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>

