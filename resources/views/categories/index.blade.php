<x-app-layout>
    
    <style>
    .input-group .form-control{
        border-radius: 14px 0 0 14px !important;
        height: 54px;
    }

    .input-group .btn{
        border-radius: 0 14px 14px 0 !important;
        min-width: 110px;
    }

    .page-title{
    font-weight:700;
    color:#1e293b;
    }

    .sub-title{
    color:#64748b;
    font-size:15px;
    }
    </style>

{{-- gunakan layout/warna yang konsisten dengan halaman lain --}}
<div class="flex min-h-screen bg-gray-100">

    <!-- SIDEBAR -->
        @include('components.sidebar')

   <!-- CONTENT -->
    <main class="flex-1 min-w-0 w-100">

    <div class="p-3 p-md-4">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

    <div>

        <h1 class="page-title fs-2 fs-md-1 mb-1">
            Daftar Kategori
        </h1>

        <p class="sub-title mb-0">
            Kelola kategori dokumen
        </p>
    </div>

    <a href="#"
       class="btn btn-primary"
       data-bs-toggle="modal"
       data-bs-target="#kategoriModal">

        + Tambah Kategori

    </a>

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
                    placeholder="🔍 Cari kategori..."
                    value="{{ request('search') }}">

                <button
                    class="btn btn-primary px-4"
                    type="submit">

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

                    <div class="d-flex justify-content-center gap-2">

                                            <a
                                                href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-outline-primary btn-sm rounded-pill">
                                                Edit
                                            </a>


                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="m-0">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm rounded-pill"
                                                onclick="return confirm('Yakin hapus kategori?')">

                                                Hapus
                                            </button>

                                        </form>

                                    </div>

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