<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

        <!-- Sidebar (ikut styling yang dipakai di halaman lain) -->
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
                    class="flex items-center px-6 py-3 no-underline {{ request()->routeIs('document.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    📁 Kelola Dokumen
                </a>

                <a href="{{ route('categories.index') }}"
                    class="flex items-center px-6 py-3 no-underline {{ request()->routeIs('categories.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    📂 Kategori
                </a>

                <a href="{{ route('users.index') }}"
                    class="flex items-center px-6 py-3 no-underline {{ request()->routeIs('users.*') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    👤 Pengguna
                </a>

                <a href="{{ route('activity.logs') }}"
                    class="flex items-center px-6 py-3 no-underline {{ request()->routeIs('activity.logs') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    📝 Log Aktivitas
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-6 py-3 text-red-500 hover:bg-red-100">
                        🚪 Logout
                    </button>
                </form>
            </nav>
        </aside>

        <main class="flex-1 p-6">
            <div class="mb-4">
                <h1 class="text-3xl font-bold text-blue-700">📝 Log Aktivitas</h1>
                <p class="text-gray-600 mt-1">Aktivitas terbaru akun kamu (upload & hapus dokumen).</p>
            </div>

            <div class="bg-white rounded-2xl shadow overflow-hidden">
                <div class="px-4 py-3 border-b flex items-center justify-between gap-3 flex-wrap">
                    <div>
                        <h2 class="text-lg font-bold text-gray-800">Riwayat Aktivitas</h2>
                        <p class="text-sm text-gray-600">{{ $logs->total() }} log ditemukan</p>
                    </div>
                </div>

                <div class="p-4">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-500 uppercase">Tanggal</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-500 uppercase">User</th>
                                    <th class="px-3 py-2 text-left text-xs font-semibold text-gray-500 uppercase">Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                    @forelse($logs as $log)
                        @php
                            $action = $log->action ?? '';
                            $badgeClass = match(true) {
                                str_contains($action, 'created') => 'bg-emerald-100 text-emerald-700',
                                str_contains($action, 'updated') => 'bg-blue-100 text-blue-700',
                                str_contains($action, 'deleted') => 'bg-rose-100 text-rose-700',
                                default => 'bg-slate-100 text-slate-700',
                            };

                            $createdAt = optional($log->created_at);
                            $timeText = $createdAt ? $createdAt->format('d M Y, H:i') : '-';
                            $description = $log->description ?: $log->action;

                            $who = $log->user?->name;
                            if (!$who) {
                                $who = $log->user?->email;
                            }
                            if (!$who) {
                                $who = '';
                            }
                        @endphp

                        <tr>
                            <td class="px-3 py-3 whitespace-nowrap">
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $badgeClass }}">
                                    {{ $action }}
                                </span>
                            </td>

                            <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-700">
                                {{ $timeText }}
                            </td>

                            <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-800">
                                {{ $who ?: '-' }}
                            </td>

                            <td class="px-3 py-3 text-sm text-gray-800 break-words">
                                {{ $description }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-3 py-10">
                                <div class="text-center text-gray-500">Belum ada aktivitas.</div>
                            </td>
                        </tr>
                    @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="px-4 py-3 border-t">
                    {{ $logs->links() }}
                </div>
            </div>
        </main>
    </div>
</x-app-layout>

