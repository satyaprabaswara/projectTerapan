<style>
        body{
            font-family:'Segoe UI',sans-serif;
        }


        .page-title{
            font-size:36px;
            font-weight:700;
            color:#1e293b;
        }

        .sub-title{
            color:#64748b;
            font-size:15px;
        }

        .main-card{
            border:none;
            border-radius:22px;
            overflow:hidden;
            box-shadow:0 10px 35px rgba(0,0,0,.08);
            background:white;
        }

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

        .btn-upload{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            border:none;
            border-radius:14px;
            padding:14px 28px;
            font-weight:600;
        }

        .table thead{
            background:#0f172a;
            color:white;
        }

        .table thead th{
            border:none;
            padding:18px;
            text-align:center;
        }

        .table tbody td{
            padding:20px;
            vertical-align:middle;
        }

        .table tbody tr:hover{
            background:#f8fafc;
        }

        .badge-category{
            background:#dbeafe;
            color:#2563eb;
            padding:8px 16px;
            border-radius:30px;
            font-weight:600;
        }

        .btn-view{
            background:#0ea5e9;
            color:white;
            border:none;
            border-radius:10px;
            padding:8px 14px;
        }

        .btn-download{
            background:#22c55e;
            color:white;
            border:none;
            border-radius:10px;
            padding:8px 14px;
        }

        .btn-delete{
            background:#ef4444;
            color:white;
            border:none;
            border-radius:10px;
            padding:8px 14px;
        }

        .empty-state{
            padding:40px;
            text-align:center;
            color:#94a3b8;
        }

        /* MODAL */
        .modal-content{
            border:none;
            border-radius:30px;
            padding:40px;
        }

        .upload-area{
            border:2px dashed #d6dce5;
            border-radius:25px;
            background:#f8fafc;
            padding:35px;
            text-align:center;
        }

        .upload-area h4{
            font-weight:700;
            margin-bottom:10px;
        }

        .upload-area p{
            color:#64748b;
            margin-bottom:25px;
        }

        .file-upload-box{
            display:flex;
            align-items:center;
            background:white;
            border:1px solid #dbe2ea;
            border-radius:20px;
            overflow:hidden;
            padding:10px;
            max-width:500px;
            margin:auto;
        }

        .custom-file-btn{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:white;
            padding:14px 24px;
            border-radius:14px;
            cursor:pointer;
            font-weight:600;
            white-space:nowrap;
            transition:.3s;
        }

        .custom-file-btn:hover{
            transform:translateY(-2px);
        }

        .file-name{
            margin-left:16px;
            color:#64748b;
            overflow:hidden;
            text-overflow:ellipsis;
            white-space:nowrap;
        }

        .btn-submit{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            border:none;
            border-radius:14px;
            padding:14px 28px;
            font-weight:600;
        }

        .form-select{
            border:1px solid #dbe2ea;
            padding:14px 20px;
        }

        .form-select:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 .2rem rgba(37,99,235,.15);
        }

        .btn-close{
            opacity:.7;
        }

        .btn-close:hover{
            opacity:1;
            transform:scale(1.05);
        }

        /* Sidebar */
        .w-64{ width: 16rem; }

        .hover-bg:hover{
            background:#f1f5f9;
        }

        @media (max-width: 992px){
            .w-64{ width: 13rem; }
        }

        @media (max-width: 768px){
            .w-64{ width: 100%; }
            main{ padding: 1rem !important; }
            .d-flex.min-vh-100{ flex-direction: column; }
        }

        td a:hover{
            color:#2563eb !important;
            text-decoration:underline !important;
        }

    </style>


<x-app-layout>

    <div class="flex min-h-screen bg-gray-100">

        <!-- Sidebar (tanpa kotak, kebawah seperti dashboard) -->
            @include('components.sidebar')

        <!-- Main Content -->
            <main class="flex-1">
            <div class="p-6">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>
                <h1 class="page-title">
                            📄 Daftar Dokumen
                        </h1>

            <p class="sub-title">
                Kelola dan akses dokumen perusahaan
            </p>
        </div>

        <button
            class="btn btn-primary btn-upload"
            type="button"
            data-bs-toggle="modal"
            data-bs-target="#uploadModal">

            + Upload Dokumen
        </button>

    </div>

    <!-- SEARCH (sama seperti dashboard: ada kategori + search) -->
    <div class="bg-white rounded-xl shadow-sm p-3 mb-4">
        <form
            method="GET"
            action="{{ route('document.index') }}">

            <div class="row g-3 align-items-end">

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


    <!-- TABLE -->
    <div class="card main-card">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokumen</th>
                            <th>Kategori</th>
                            <th>Pemilik</th>
                            <th>Tanggal Diubah</th>
                            <th>Ukuran File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @if(!isset($documents))
                        {{-- debug --}}
                    @endif

                    @forelse($documents as $index => $d)

                    <tr>

                        <td class="text-center fw-bold">
                            {{ $index + 1 }}
                        </td>

                        <td class="fw-semibold">
                            <a
                                href="{{ route('document.show', $d->id) }}"
                                class="text-decoration-none fw-semibold text-dark">

                                {{ $d->nama_dokumen }}

                            </a>
                        </td>

                        <td class="text-center">
                            <span class="badge-category">
                                {{ optional($d->category)->nama_kategori ?? '-' }}
                            </span>
                        </td>

                        <td>
                            {{ optional($d->user)->name ?? '-' }}
                        </td>

                        <td class="text-center">
                            {{ optional($d->updated_at)->format('d M Y') }}
                        </td>

                        <td class="text-center">
                            @php
                                $bytes = $d->file_size;
                                if ($bytes === null) {
                                    $display = '-';
                                } else {
                                    $kb = $bytes / 1024;
                                    $mb = $kb / 1024;

                                    // Tampilkan KB saja kalau < 1 MB, tampilkan MB saja kalau >= 1 MB
                                    if ($mb < 1) {
                                        $display = round($kb, 2) . ' KB';
                                    } else {
                                        $display = round($mb, 2) . ' MB';
                                    }
                                }
                            @endphp
                            {{ $display }}
                        </td>

                        <td class="text-center">
                            <div class="dropdown">
                                <button
                                    class="btn btn-light btn-sm dropdown-toggle"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    ⋮
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end">

                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('document.view', $d->id) }}"
                                            target="_blank">
                                            Buka dengan... 
                                        </a>
                                    </li>

                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('document.download',$d->id) }}">
                                            Download
                                        </a>
                                    </li>

                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            onclick="alert('Fitur ganti nama belum diimplementasi'); return false;">
                                            Ganti nama
                                        </a>
                                    </li>

                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            onclick="alert('Fitur buat salinan belum diimplementasi'); return false;">
                                            Buat salinan
                                        </a>
                                    </li>

                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            onclick="alert('Fitur bagikan belum diimplementasi'); return false;">
                                            Bagikan
                                        </a>
                                    </li>

                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('document.show', $d->id) }}">
                                            Informasi file
                                        </a>
                                    </li>

                                    <li><hr class="dropdown-divider"></li>

                                    <li>
                                        <form
                                            action="{{ route('document.destroy',$d->id) }}"
                                            method="POST"
                                            class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                onclick="return confirm('Yakin hapus dokumen?')"
                                                class="dropdown-item text-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>


                    </tr>

                    @empty

                    <tr>
                        <td colspan="7" class="empty-state">
                            Tidak ada data dokumen
                        </td>
                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- MODAL -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content position-relative">

            <!-- Close Button -->
            <button
                type="button"
                class="btn-close position-absolute top-0 end-0 m-4"
                data-bs-dismiss="modal">
            </button>

            <h1 class="fw-bold mb-2">
                Upload Dokumen
            </h1>

            <p class="text-muted mb-4">
                Upload dan simpan dokumen perusahaan
            </p>

            <!-- FORM -->
            <form
                action="{{ route('document.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <!-- Nama Dokumen -->
                <div class="mb-4">
                    <label class="fw-semibold mb-2">
                        Nama Dokumen
                    </label>

                    <input
                        type="text"
                        name="nama_dokumen"
                        class="form-control form-control-lg rounded-4"
                        placeholder="Masukkan nama dokumen..."
                        required>

                </div>



                <!-- Kategori -->
                <div class="mb-4">
                    <label class="fw-semibold mb-2">
                        Kategori Dokumen
                    </label>

                    <select
                        name="category_id"
                        class="form-select form-select-lg rounded-4"
                        required>

                        <option value="">
                            -- Pilih Kategori --
                        </option>

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">

                                {{ $category->nama_kategori }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label class="fw-semibold mb-2">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        class="form-control rounded-4"
                        rows="4"
                        placeholder="Masukkan deskripsi dokumen..."></textarea>

                </div>

                <!-- Upload Area -->
                <div class="upload-area mt-4">
                    <h4>
                        📁 Pilih File Dokumen
                    </h4>

                    <p>
                        Upload PDF, DOC, XLS, dan lainnya
                    </p>

                    <div class="file-upload-box">
                        <label
                            for="fileInput"
                            class="custom-file-btn">

                            Pilih File

                        </label>

                        <span
                            id="file-name"
                            class="file-name">

                            Belum ada file dipilih

                        </span>

                        <input
                            type="file"
                            id="fileInput"
                            name="file"
                            accept=".pdf,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg"
                            hidden
                            required>

                    </div>
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="btn btn-submit mt-4 text-white">

                    Upload Dokumen

                </button>

            </form>

        </div>
    </div>
</div>

<!-- Bootstrap JS sudah dimuat di layouts/app.blade.php -->
<script>
document.addEventListener('DOMContentLoaded', () => {

    // Prevent Bootstrap modal from stealing focus in a way that blocks dropdown interaction
    const uploadModalEl = document.getElementById('uploadModal');
    if (uploadModalEl) {
        uploadModalEl.addEventListener('shown.bs.modal', () => {
            const closeBtn = uploadModalEl.querySelector('[data-bs-dismiss="modal"]');
            if (closeBtn) closeBtn.focus();
        });
    }

    // Re-initialize Bootstrap dropdowns
    const dropdownToggles = document.querySelectorAll('[data-bs-toggle="dropdown"]');
    dropdownToggles.forEach((el) => {
        try {
            // eslint-disable-next-line no-new
            new bootstrap.Dropdown(el);
        } catch (e) {
            // ignore
        }
    });

    const input = document.getElementById('fileInput');
    const fileNameEl = document.getElementById('file-name');

    if (!input || !fileNameEl) return;

    input.addEventListener('change', function () {
        const fileName = this.files && this.files.length
            ? this.files[0].name
            : 'Belum ada file dipilih';

        fileNameEl.innerText = fileName;
    });
});
</script>

</main>
</div>
</x-app-layout>


