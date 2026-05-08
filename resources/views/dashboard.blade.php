<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg">
            <div class="p-6 border-b">
                <h1 class="text-2xl font-bold text-blue-700">
                    PT SPR Langgak
                </h1>
                <p class="text-sm text-gray-500">
                    Sistem Dokumentasi Finance
                </p>
            </div>

            <nav class="mt-6">
                <a href="#" class="flex items-center px-6 py-3 bg-blue-500 text-white">
                    📊 Dashboard
                </a>

                <a href="/document"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
                    📁 Kelola Dokumen
                </a>

                <a href="#"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
                    📂 Kategori
                </a>

                <a href="#"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
                    👤 Pengguna
                </a>

                <a href="#"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-200">
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

            <!-- Cards -->
            <div class="grid grid-cols-4 gap-6 mb-6">

            <div class="bg-blue-500 text-white p-5 rounded-xl shadow">
                <h3 class="text-lg">Total Dokumen</h3>
                <p class="text-4xl font-bold mt-2">
                    {{ $totalDocuments }}
                </p>
            </div>

            <div class="bg-green-500 text-white p-5 rounded-xl shadow">
                <h3 class="text-lg">Total Kategori</h3>
                <p class="text-4xl font-bold mt-2">
                    {{ $totalCategories }}
                </p>
            </div>

            <div class="bg-yellow-400 text-white p-5 rounded-xl shadow">
                <h3 class="text-lg">Dokumen Hari Ini</h3>
                <p class="text-4xl font-bold mt-2">
                    {{ $todayDocuments }}
                </p>
            </div>

            <div class="bg-red-400 text-white p-5 rounded-xl shadow">
                <h3 class="text-lg">Total Pengguna</h3>
                <p class="text-4xl font-bold mt-2">
                    {{ $totalUsers }}
                </p>
            </div>

        </div>

            <!-- Table -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-2xl font-bold mb-4">
                    Daftar Dokumen
                </h3>

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
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