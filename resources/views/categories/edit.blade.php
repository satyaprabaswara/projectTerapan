<x-app-layout>
    <style>
        .page-title{
            font-weight:700;
            color:#1e293b;
        }
        .sub-title{
            color:#64748b;
            font-size:15px;
        }
    </style>

    <div class="flex min-h-screen bg-gray-100">
        @include('components.sidebar')

        <main class="flex-1 min-w-0 w-100">
            <div class="p-3 p-md-4">
                <div class="mb-4">
                    <h1 class="page-title fs-2 fs-md-1 mb-1">Edit Kategori</h1>
                    <p class="sub-title mb-0">Ganti nama kategori dokumen</p>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4">
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="fw-semibold mb-2">Nama Kategori</label>
                                <input
                                    type="text"
                                    name="nama_kategori"
                                    class="form-control rounded-4 py-3"
                                    value="{{ old('nama_kategori', $category->nama_kategori) }}"
                                    required
                                    maxlength="255"
                                >
                            </div>

                            <div class="d-flex gap-2 flex-wrap">
                                <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">Simpan Perubahan</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-2">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>

