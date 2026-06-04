<x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="flex min-h-screen bg-gray-100">

    <!-- SIDEBAR -->
        @include('components.sidebar')

    <!-- CONTENT -->
    <main class="flex-1">

    <div class="p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <div>

                <h2 class="text-3xl font-bold text-gray-700">
                    Dashboard
                </h2>

                <p class="text-gray-500">
                    Selamat datang kembali,
                    {{ Auth::user()?->name }}
                </p>

            </div>

            <div class="font-semibold text-gray-700">

                {{ now()->format('d M Y') }}

            </div>

        </div>

        <!-- CARD STATISTIK -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

            <!-- Total Dokumen -->
            <div class="bg-blue-500 text-white p-4 rounded shadow-sm">

                <h3 class="text-sm opacity-90">
                    Total Dokumen
                </h3>

                <p class="text-3xl font-bold mt-2">
                    {{ $totalDocuments ?? 0 }}
                </p>

            </div>

            <!-- Total Kategori -->
            <div class="bg-green-500 text-white p-5 rounded-2xl shadow-sm">

                <h3 class="text-sm opacity-90">
                    Total Kategori
                </h3>

                <p class="text-3xl font-bold mt-2">
                    {{ $totalCategories ?? 0 }}
                </p>

            </div>

            <!-- Hari Ini -->
            <div class="bg-yellow-400 text-white p-5 rounded-2xl shadow-sm">

                <h3 class="text-sm opacity-90">
                    Dokumen Hari Ini
                </h3>

                <p class="text-3xl font-bold mt-2">
                    {{ $todayDocuments ?? 0 }}
                </p>

            </div>

            <!-- User -->
            <div class="bg-red-400 text-white p-5 rounded-2xl shadow-sm">

                <h3 class="text-sm opacity-90">
                    Total Pengguna
                </h3>

                <p class="text-3xl font-bold mt-2">
                    {{ $totalUsers ?? 0 }}
                </p>

            </div>

        </div>

        <!-- FILTER -->

<div class="bg-white rounded-2xl shadow-sm p-4 mb-6">
<form
    method="GET"
    action="{{ route('dashboard') }}">

    <div class="row g-3">

        <!-- Kategori -->
        <div class="col-md-3">

            <select
                name="category_id"
                class="w-full border rounded-lg px-4 py-2">

                <option value="">
                    Semua Kategori
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ request('category_id') == $category->id ? 'selected' : '' }}>

                        {{ $category->nama_kategori }}

                    </option>

                @endforeach

            </select>

        </div>

        <!-- Search -->
        <div class="col-md-7">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari dokumen..."
                class="w-full border rounded-lg px-4 py-2">

        </div>

        <!-- Tombol -->
        <div class="col-md-2">

            <button
                type="submit"
                class="w-full bg-blue-500 text-white rounded-lg py-2">

                Cari

            </button>

        </div>

    </div>

</form>


</div>


        <!-- CONTENT -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

            <!-- TABEL -->
            <div class="xl:col-span-2">

                <div class="bg-white rounded-2xl shadow-sm p-6">

                    <div class="flex justify-between items-center mb-4">

                        <h3 class="text-xl font-bold">
                            Daftar Dokumen
                        </h3>

                    </div>

                    <table class="w-full border-collapse">

                        <thead>

                            <tr class="bg-gray-50 text-gray-700">

                                <th class="p-3 text-left">
                                    No
                                </th>

                                <th class="p-3 text-left">
                                    Nama Dokumen
                                </th>

                                <th class="p-3 text-left">
                                    Kategori
                                </th>

                                <th class="p-3 text-left">
                                    Tanggal Upload
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($documents as $index => $document)

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

                            @empty

                            <tr>

                                <td colspan="4"
                                    class="text-center py-4 text-gray-500">

                                    Belum ada dokumen

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- SIDEBAR KANAN -->
            <div>

                <!-- CHART -->
                <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">

                    <h3 class="text-xl font-bold mb-4">

                        Kategori Dokumen

                    </h3>

                    <div style="height:300px;">
                        <canvas id="kategoriChart"></canvas>
                    </div>

                </div>

                <!-- AKTIVITAS -->
                <div class="bg-white rounded-2xl shadow-sm p-6">

                    <h3 class="text-xl font-bold mb-4">

                        Aktivitas Terbaru

                    </h3>

                    @foreach($documents->take(5) as $document)

                    <div class="mb-4 border-b pb-3">

                        <div class="font-semibold">
                            Admin
                        </div>

                        <div class="text-sm text-gray-500">

                            Menambahkan dokumen

                            <strong>
                                {{ $document->nama_dokumen }}
                            </strong>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

        </div>

    </main>

</div>

<script>

const ctx =
document.getElementById('kategoriChart');

new Chart(ctx, {

    type: 'pie',

    options: {
        responsive: true,
        maintainAspectRatio: false
    },

    data: {

        labels: [

            @foreach($categories ?? [] as $category)

                '{{ $category->nama_kategori }}',

            @endforeach

        ],

        datasets: [{

            data: [

                @foreach($categories ?? [] as $category)

                    {{ $category->documents->count() }},

                @endforeach

            ]

        }]

    }

});

</script>

</x-app-layout>