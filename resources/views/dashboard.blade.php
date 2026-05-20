<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

        <!-- Sidebar -->
        <aside class="w-64 min-h-screen bg-white shadow-md">
            <div class="p-6">
                <h1 class="text-2xl font-bold text-blue-700">
                    PT SPR Langgak
                </h1>
                <p class="text-sm text-gray-500">
                    Sistem Dokumentasi Finance
                </p>
            </div>

            <nav class="mt-6">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-6 py-3 no-underline {{ request()->routeIs('dashboard') ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
                    📊 Dashboard
                </a>

                <a href="/document"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-100 no-underline">
                    📁 Kelola Dokumen
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-100 no-underline">
                    📂 Kategori
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-100 no-underline">
                    👤 Pengguna
                </a>

                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-gray-100 no-underline">
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

        <!-- Main Content -->
        <main class="flex-1 p-6">

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-700">
                    Dashboard
                </h2>

                <div class="flex items-center gap-4">
                    <input type="text"
                        placeholder="Search..."
                        class="border rounded-lg px-4 py-2">

                    <div class="font-semibold">
                        {{ Auth::user()->name }}
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

            <div class="bg-blue-500 text-white p-4 rounded-2xl shadow-sm">
                <h3 class="text-sm opacity-90">
                    Total Dokumen
                </h3>
                <p class="text-3xl font-bold mt-2">
                    {{ $totalDocuments }}
                </p>
            </div>

            <div class="bg-green-500 text-white p-4 rounded-2xl shadow-sm">
                <h3 class="text-sm opacity-90">
                    Total Kategori
                </h3>
                <p class="text-3xl font-bold mt-2">
                    {{ $totalCategories }}
                </p>
            </div>

            <div class="bg-yellow-400 text-white p-4 rounded-2xl shadow-sm">
                <h3 class="text-sm opacity-90">
                    Dokumen Hari Ini
                </h3>
                <p class="text-3xl font-bold mt-2">
                    {{ $todayDocuments }}
                </p>
            </div>

            <div class="bg-red-400 text-white p-4 rounded-2xl shadow-sm">
                <h3 class="text-sm opacity-90">
                    Total Pengguna
                </h3>
                <p class="text-3xl font-bold mt-2">
                    {{ $totalUsers }}
                </p>
            </div>
        </div>

            <!-- Table -->
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <h3 class="text-2xl font-bold mb-4">
                    Daftar Dokumen
                </h3>
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50 text-gray-700">
                            <th class="p-3 text-left">No</th>
                            <th class="p-3 text-left">Nama Dokumen</th>
                            <th class="p-3 text-left">Kategori</th>
                            <th class="p-3 text-left">Tanggal Upload</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($documents as $index => $document)
                        <tr class="border-b">
                            <td class="p-3">
                                {{ $index + 1 }}
                            </td>

                            <td class="p-3">
                                {{ $document->nama_dokumen }}
                            </td>

                            <td class="p-3">
                                {{ $document->category->nama_kategori ?? '-' }}
                            </td>

                            <td class="p-3">
                                {{ $document->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</x-app-layout>