<x-app-layout>

<div class="d-flex min-vh-100 bg-light">

    <!-- SIDEBAR -->
    <aside class="bg-white shadow-sm"
        style="width:260px; min-height:100vh;">

        <div class="p-4 border-bottom">
            <h2 class="fw-bold text-primary mb-1">
                PT SPR Langgak
            </h2>

            <small class="text-muted">
                Sistem Dokumentasi Finance
            </small>
        </div>

        <nav class="d-flex flex-column mt-3">

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
                class="px-4 py-3 text-decoration-none text-dark">

                📊 Dashboard
            </a>

            <!-- Kelola Dokumen -->
            <a href="{{ route('document.index') }}"
                class="px-4 py-3 text-decoration-none text-dark">

                📁 Kelola Dokumen
            </a>

            <!-- Kategori -->
            <a href="{{ route('categories.index') }}"
                class="px-4 py-3 text-decoration-none text-white bg-primary">

                📂 Kategori
            </a>

            <!-- Pengguna -->
            <a href="{{ route('users.index') }}"
                class="px-4 py-3 text-decoration-none text-dark">

                👤 Pengguna
            </a>

            <!-- Log Aktivitas -->
            <a href="#"
                class="px-4 py-3 text-decoration-none text-dark">

                📝 Log Aktivitas
            </a>

            <!-- Logout -->
            <form method="POST"
                action="{{ route('logout') }}">

                @csrf

                <button
                    class="border-0 bg-transparent text-danger text-start px-4 py-3 w-100">

                    🚪 Logout
                </button>
            </form>

        </nav>
    </aside>

    <!-- CONTENT -->
    <main class="flex-grow-1 p-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h1 class="fw-bold">
                    📂 Daftar Kategori
                </h1>

                <p class="text-muted">
                    Kelola kategori dokumen
                </p>
            </div>

            <button
                class="btn btn-primary rounded-pill px-4"
                data-bs-toggle="modal"
                data-bs-target="#kategoriModal">

                + Tambah Kategori
            </button>

        </div>

        <!-- SEARCH -->
        <form
            method="GET"
            action="{{ route('categories.index') }}"
            class="mb-4">

            <div class="input-group shadow-sm">

                <input
                    type="text"
                    name="search"
                    class="form-control border-0 py-3"
                    placeholder="Cari kategori...">

                <button
                    class="btn btn-primary px-4">

                    Cari
                </button>

            </div>

        </form>

        <!-- TABLE -->
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                <table class="table align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th class="text-center">
                                Aksi
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($categories as $index => $category)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>

                            <td>
                                {{ $category->nama_kategori }}
                            </td>

                            <td class="text-center">

                                <form
                                    action="{{ route('categories.destroy', $category->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm rounded-pill"
                                        onclick="return confirm('Yakin hapus kategori?')">

                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="3"
                                class="text-center text-muted py-4">

                                Tidak ada kategori
                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </main>

</div>

<!-- MODAL TAMBAH KATEGORI -->
<div class="modal fade"
    id="kategoriModal"
    tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content rounded-4 border-0">

            <div class="modal-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <h2 class="fw-bold mb-0">
                        Tambah Kategori
                    </h2>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <p class="text-muted mb-4">
                    Tambahkan kategori dokumen baru
                </p>

                <form
                    action="{{ route('categories.store') }}"
                    method="POST">

                    @csrf

                    <div class="mb-4">

                        <label class="fw-semibold mb-2">
                            Nama Kategori
                        </label>

                        <input
                            type="text"
                            name="nama_kategori"
                            class="form-control rounded-4 py-3"
                            placeholder="Contoh: Invoice"
                            required>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary w-100 rounded-pill py-3">

                        Simpan Kategori
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>