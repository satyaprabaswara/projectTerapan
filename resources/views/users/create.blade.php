<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 min-h-screen bg-white shadow-md">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-blue-700">PT SPR Langgak</h1>
                <p class="text-sm text-gray-500">Sistem Dokumentasi Finance</p>
            </div>
            <nav class="mt-6">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-6 py-3 no-underline {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    📊 Dashboard
                </a>
                <a href="{{ route('document.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-100 no-underline">
                    📁 Kelola Dokumen
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-100 no-underline">
                    📂 Kategori
                </a>
                <a href="{{ route('users.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 bg-gray-100 no-underline">
                    👤 Pengguna
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-100 no-underline">
                    📝 Log Aktivitas
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left px-6 py-3 text-red-500 hover:bg-red-100">🚪 Logout</button>
                </form>
            </nav>
        </aside>

        <main class="flex-1 p-6">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-700">Tambah Pengguna</h2>
                <p class="text-sm text-gray-500">Hanya admin yang bisa membuat user</p>
            </div>

            <div class="bg-white rounded-2xl shadow-sm p-6 max-w-2xl">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-lg font-bold text-gray-700">Form Tambah Pengguna</h3>
                            <p class="text-sm text-gray-500">Isi data di bawah lalu klik <b>Simpan</b></p>
                        </div>
                    </div>

                    <div class="mb-4">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama</label>
                        <input name="name" value="{{ old('name') }}" class="w-full border rounded-xl px-4 py-3" required>
                        @error('name')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input name="email" value="{{ old('email') }}" type="email" class="w-full border rounded-xl px-4 py-3" required>
                        @error('email')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <input name="password" type="password" class="w-full border rounded-xl px-4 py-3" required>
                        @error('password')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                        <input name="password_confirmation" type="password" class="w-full border rounded-xl px-4 py-3" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
                        <select name="role" class="w-full border rounded-xl px-4 py-3" required>
                            <option value="admin" {{ old('role')==='admin' ? 'selected' : '' }}>admin</option>
                            <option value="viewer" {{ old('role')==='viewer' ? 'selected' : '' }}>viewer</option>
                        </select>
                        @error('role')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="flex gap-3 mt-2">
                        <button type="submit"
                                class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl font-semibold shadow">
                            ✅ Simpan
                        </button>
                        <a href="{{ route('users.index') }}"
                           class="border px-5 py-3 rounded-xl font-semibold text-gray-700 hover:bg-gray-50">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</x-app-layout>

