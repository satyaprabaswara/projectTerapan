    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Dokumen</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
        /* gunakan styling dari bootstrap/tailwind yang sudah ada */
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
    </style>

<x-app-layout>

    <div class="flex min-h-screen bg-gray-100">

        <!-- Sidebar (tanpa kotak, kebawah seperti dashboard) -->
        <aside class="w-64 min-h-screen bg-white shadow-lg">
            <div class="p-6 border-b">
                <h1 class="text-2xl font-bold text-blue-700">
                    PT SPR Langgak
                </h1>
                <p class="text-sm text-gray-500">
                    Sistem Dokumentasi Finance
                </p>
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

                <form method="POST" action="{{ route('logout') }}" class="">
                    @csrf

                    <button class="w-full text-left px-6 py-3 text-red-500 hover:bg-red-100">
                        🚪 Logout
                    </button>
                </form>

            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">

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
            data-bs-toggle="modal"
            data-bs-target="#uploadModal">

            + Upload Dokumen
        </button>

    </div>

    <!-- SEARCH -->
    <form
        method="GET"
        action="{{ route('document.index') }}"
        class="mb-4">

        <div class="input-group search-box">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="🔍 Cari dokumen..."
                value="{{ request('search') }}">

            <button class="btn btn-primary px-4">
                Cari
            </button>

        </div>

    </form>

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
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($documents as $index => $d)

                    <tr>

                        <td class="text-center fw-bold">
                            {{ $index + 1 }}
                        </td>

                        <td class="fw-semibold">
                            {{ $d->nama_dokumen }}
                        </td>

                        <td class="text-center">
                            <span class="badge-category">
                                {{ $d->category->nama_kategori ?? '-' }}
                            </span>
                        </td>

                        <td class="text-center">
                            <a
                                href="{{ asset('storage/'.$d->file) }}"
                                target="_blank"
                                class="btn btn-view">
                                👁 Lihat
                            </a>
                        </td>

                        <td>
                            <div class="d-flex gap-2 justify-content-center">

                                <a
                                    href="{{ route('document.download',$d->id) }}"
                                    class="btn btn-download">

                                    ⬇ Download
                                </a>

                                <form
                                    action="{{ route('document.destroy',$d->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Yakin hapus dokumen?')"
                                        class="btn btn-delete">

                                        🗑 Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="empty-state">
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

                <!-- Tanggal Upload -->
                <div class="mb-4">

                    <label class="fw-semibold mb-2">
                        Tanggal Upload
                    </label>

                    <input
                        type="date"
                        name="tanggal_upload"
                        class="form-control form-control-lg rounded-4"
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

                        @isset($categories)
                            @foreach($categories as $c)
                                <option value="{{ $c->id }}">
                                    {{ $c->nama_kategori ?? $c->name ?? $c->title ?? $c->id }}
                                </option>
                            @endforeach
                        @endisset

                    </select>

                </div>

                <!-- Upload -->
                <div class="upload-area">

                    <h4>📁 Pilih File Dokumen</h4>

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
                            hidden
                            required>

                    </div>

                </div>

                <button
                    type="submit"
                    class="btn btn-submit mt-4 text-white">

                    Upload Dokumen
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document
.getElementById('fileInput')
.addEventListener('change', function () {

    const fileName =
        this.files.length
        ? this.files[0].name
        : 'Belum ada file dipilih';

    document.getElementById('file-name')
        .innerText = fileName;
});
</script>

</main>
</div>
</x-app-layout>

