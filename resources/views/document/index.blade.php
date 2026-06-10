<style>
        body{
            font-family:'Segoe UI',sans-serif;
        }

        .header-link{
            color:white !important;
            text-decoration:none;
            font-weight:600;
        }

        .header-link:hover{
            color:#cbd5e1 !important;
        }

        /* HEADER TABLE */
        .table thead{
            background:#f8fafc !important;
        }

        .table thead th{
            background:#f8fafc !important;
            color:#334155 !important;
            font-size:18px;
            font-weight:700;
            border:none;
            padding:22px 20px;
            text-align:left !important;
        }

        /* Link Header Sort */
        .header-link{
            color:#334155 !important;
            text-decoration:none;
            font-weight:700;
        }

        .header-link:hover{
            color:#2563eb !important;
        }

        /* Isi tabel */
        .table tbody td{
            padding:26px 20px;
            font-size:16px;
            color:#1e293b;
            border-bottom:1px solid #e5e7eb;
        }

        /* Nama dokumen */
        .document-name{
            font-size:16px;
            font-weight:600;
            color:#1e293b;
        }

        /* Pemilik */
        .owner-name{
            font-weight:500;
            color:#334155;
        }

        /* Tanggal */
        .document-date{
            color:#334155;
            font-weight:500;
        }

        /* Ukuran file */
        .document-size{
            color:#475569;
        }
        .file-icon{
            width:42px;
            height:42px;
            border-radius:12px;

            display:flex;
            align-items:center;
            justify-content:center;

            font-size:20px;
            margin-right:12px;

            flex-shrink:0;
        }

        .file-pdf{
            background:#fee2e2;
            color:#dc2626;
        }

        .file-doc{
            background:#dbeafe;
            color:#2563eb;
        }

        .file-xls{
            background:#dcfce7;
            color:#16a34a;
        }

        .file-img{
            background:#f3e8ff;
            color:#9333ea;
        }

        .file-default{
            background:#f1f5f9;
            color:#475569;
        }

        .document-cell{
            display:flex;
            align-items:center;
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

                        <th class="text-start">
                            <a href="{{ route('document.index', array_merge(
                                request()->except('sort','order'),
                                [
                                    'sort'=>'nama',
                                    'order'=>(request('sort')=='nama' && request('order')=='asc')
                                        ? 'desc'
                                        : 'asc'
                                ]
                            )) }}"
                            class="header-link">

                                Nama Dokumen

                            </a>
                        </th>

                        <th class="text-center">
                            Kategori
                        </th>

                        <th class="text-center">
                            Pemilik
                        </th>

                        <th class="text-center">
                            <a href="{{ route('document.index', array_merge(
                                request()->except('sort','order'),
                                [
                                    'sort'=>'tanggal',
                                    'order'=>(request('sort')=='tanggal' && request('order')=='asc')
                                        ? 'desc'
                                        : 'asc'
                                ]
                            )) }}"
                            class="header-link">

                                Tanggal Diubah

                            </a>
                        </th>

                        <th class="text-center">
                            Ukuran File
                        </th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>
                    </thead>

                    <tbody>

                    @if(!isset($documents))
                        {{-- debug --}}
                    @endif

                    @forelse($documents as $index => $d)

                    <tr>

                        <td>

                            @php

                                $ext = strtolower(
                                    pathinfo($d->file ?? '', PATHINFO_EXTENSION)
                                );

                                $iconClass = 'bi-file-earmark';
                                $colorClass = 'file-default';

                                if($ext == 'pdf'){
                                    $iconClass = 'bi-file-earmark-pdf-fill';
                                    $colorClass = 'file-pdf';
                                }

                                elseif(in_array($ext,['doc','docx'])){
                                    $iconClass = 'bi-file-earmark-word-fill';
                                    $colorClass = 'file-doc';
                                }

                                elseif(in_array($ext,['xls','xlsx'])){
                                    $iconClass = 'bi-file-earmark-excel-fill';
                                    $colorClass = 'file-xls';
                                }

                                elseif(in_array($ext,['png','jpg','jpeg','gif'])){
                                    $iconClass = 'bi-image-fill';
                                    $colorClass = 'file-img';
                                }

                            @endphp

                            <div class="document-cell">

                                <div class="file-icon {{ $colorClass }}">
                                    <i class="bi {{ $iconClass }}"></i>
                                </div>

                                <div>

                                    <a
                                        href="{{ route('document.view',$d->id) }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="text-decoration-none fw-semibold text-dark">

                                        {{ $d->nama_dokumen }}

                                    </a>

                                </div>

                            </div>

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
                                $bytes = $d->file_size ?? null;

                                if ($bytes === null) {
                                    $display = '-';
                                } else {
                                    $bytes = (float) $bytes;
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

<!-- LIHAT DOKUMEN -->
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('document.view', $d->id) }}"
                                            target="_blank"
                                            rel="noopener noreferrer">

                                            👁️ Lihat Dokumen

                                        </a>
                                    </li>

                                    <!-- DOWNLOAD -->
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('document.download',$d->id) }}">

                                            ⬇️ Download

                                        </a>
                                    </li>

<!-- GANTI NAMA (Belum tersedia) -->
                                    <li>
                                        <span
                                            class="dropdown-item text-muted"
                                            aria-disabled="true">
                                            ✏️ Ganti Nama
                                        </span>
                                    </li>

                                    <!-- BUAT SALINAN (Belum tersedia) -->
                                    <li>
                                        <span
                                            class="dropdown-item text-muted"
                                            aria-disabled="true">
                                            📄 Buat Salinan
                                        </span>
                                    </li>


                                    <!-- INFORMASI FILE -->
                                    <li>
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                            role="button"
                                            data-bs-toggle="offcanvas"
                                            data-bs-target="#infoCanvas"
                                            aria-controls="infoCanvas"
                                            data-doc-id="{{ $d->id }}">

                                            ℹ️ Informasi File

                                        </a>
                                    </li>


                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>

                                    <!-- HAPUS -->
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

                                                🗑️ Hapus

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

<!-- Offcanvas Info Dokumen -->
<div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="infoCanvas"
    aria-labelledby="infoCanvasLabel"
    style="width: 460px;">

    <div class="offcanvas-header">
        <h5
            class="offcanvas-title fw-bold"
            id="infoCanvasLabel">
            ℹ️ Informasi Dokumen
        </h5>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <div id="infoCanvasBody" class="text-muted">
            Pilih dokumen untuk melihat detail.
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

    // Offcanvas info dokumen
    const infoCanvasBody = document.getElementById('infoCanvasBody');
    const infoCanvas = document.getElementById('infoCanvas');

    if (infoCanvas && infoCanvasBody) {
        infoCanvas.addEventListener('shown.bs.offcanvas', (event) => {
            const trigger = event.relatedTarget;
            const docId = trigger?.getAttribute('data-doc-id');

            infoCanvasBody.innerHTML = 'Memuat informasi dokumen...';

            if (!docId) {
                infoCanvasBody.innerHTML = 'Dokumen tidak ditemukan.';
                return;
            }

            // DEBUG: cetak docId yang terbaca dari trigger
            console.log('[infoCanvas] docId=', docId);

            fetch(`/document/${docId}`)
                .then((res) => {
                    if (!res.ok) throw new Error('Gagal memuat');
                    return res.text();
                })
                .then((html) => {
                    const container = document.createElement('div');
                    container.innerHTML = html;


                    const card = container.querySelector('.bg-white.rounded-5');
                    if (!card) {
                        infoCanvasBody.innerHTML = '<div class="text-muted">Informasi tidak tersedia.</div>';
                        return;
                    }

                    const nama = (card.querySelector('h2')?.textContent || '').trim();
                    const strongNodes = Array.from(card.querySelectorAll('strong'));

                    const getAfterStrong = (label) => {
                        const node = strongNodes.find((s) => s.textContent.trim().toLowerCase() === label);
                        if (!node) return '';
                        return (node.parentElement?.textContent || '').replace(node.textContent, '').trim();
                    };

                    const kategoriNode = strongNodes.find((s) => s.textContent.trim().toLowerCase() === 'kategori:');
                    const kategori = kategoriNode
                        ? (kategoriNode.parentElement?.textContent || '').replace(kategoriNode.textContent, '').trim()
                        : '';

                    const tanggalUpload = getAfterStrong('tanggal upload:');
                    const pemilik = getAfterStrong('pemilik:');
                    const ukuran = getAfterStrong('ukuran file:');

                    // Tentukan jenis file dari extension yang ada di file path pada response show.
                    // Ambil extension dari path file yang (di show) tersimpan di model.
                    // Karena view show tidak menampilkan file path secara eksplisit, kita fallback pakai teks total.
                    const fileText = (card.textContent || '').toLowerCase();
                    // fallback: ambil ekstensi dari teks yang mungkin berisi nama file/path
                    const extMatch = fileText.match(/\.(pdf|docx?|xls[x]?|png|jpe?g|gif)(?![a-z0-9])/);
                    const ext = extMatch ? extMatch[1].toLowerCase().replace('jpeg','jpg') : '';

                    const jenisFile = ext === 'pdf'
                        ? 'PDF'
                        : (ext === 'doc' || ext === 'docx')
                            ? 'Word'
                            : (ext === 'xls' || ext === 'xlsx')
                                ? 'Excel'
                                : (ext === 'png' || ext === 'jpg' || ext === 'gif')
                                    ? 'Gambar'
                                    : '-';

                    // UI akses: tampilkan form kelola akses + daftar shared users
                    const tampilkan = `
                        <div class="p-1">
                            <script type="application/json" id="__doc_id__">${docId}</script>
                            <div class="mb-3">
                                <div style="font-size: 42px; font-weight: 700; color:#0f172a; line-height:1.1;">${nama || '-'}</div>
                                <div class="text-muted">${kategori ? 'Kategori: ' + kategori : 'Kategori: -'}</div>
                            </div>

                            <div class="bg-light border rounded-4 p-3 mb-4">
                                <div class="fw-bold mb-1">Ringkasan</div>
                                <div class="d-flex justify-content-between gap-3">
                                    <div class="text-muted">Pemilik</div>
                                    <div class="fw-semibold">${pemilik || '-'}</div>
                                </div>
                                <div class="d-flex justify-content-between gap-3">
                                    <div class="text-muted">Tanggal upload</div>
                                    <div class="fw-semibold">${tanggalUpload || '-'}</div>
                                </div>
                                <div class="d-flex justify-content-between gap-3">
                                    <div class="text-muted">Ukuran</div>
                                    <div class="fw-semibold">${ukuran || '-'}</div>
                                </div>
                            </div>

                            <hr class="my-4" />
                            <h6 class="fw-bold mb-3">Akses</h6>
                            <div class="text-muted mb-3" id="accessLoading">Memuat daftar akses...</div>
                            <div class="mb-3" id="accessList"></div>

                            <div class="mt-3" id="accessManage" style="display:none;">
                                <div class="text-muted mb-2">Kelola akses (owner/admin)</div>

                                <form method="POST" action="{{ route('document.shares.store', $d->id ?? '__DOCID__') }}" id="shareForm" class="d-flex gap-2 flex-wrap">
                                    @csrf
                                    <input type="hidden" name="email" id="shareEmailInput" />
                                    <div class="flex-grow-1" style="min-width: 220px;">
                                        <input
                                            type="email"
                                            class="form-control"
                                            placeholder="Masukkan email user..."
                                            id="shareEmail"
                                            name="email"
                                            required
                                            {{ auth()->check() ? '' : 'disabled' }}>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>

                            <hr class="my-4" />
                            <h6 class="fw-bold mb-3">Detail File</h6>

                            <div class="d-flex justify-content-between gap-3 mb-2">
                                <div class="text-muted">Jenis file</div>
                                <div class="fw-semibold">${jenisFile}</div>
                            </div>
                            <div class="d-flex justify-content-between gap-3 mb-2">
                                <div class="text-muted">Ukuran</div>
                                <div class="fw-semibold">${ukuran || '-'}</div>
                            </div>
                            <div class="d-flex justify-content-between gap-3 mb-2">
                                <div class="text-muted">Pemilik</div>
                                <div class="fw-semibold">${pemilik || '-'}</div>
                            </div>
                            <div class="d-flex justify-content-between gap-3">
                                <div class="text-muted">Terakhir dimodifikasi</div>
                                <div class="fw-semibold">${tanggalUpload || '-'}</div>
                            </div>

                            <hr class="my-4" />
                            <div class="fw-bold mb-2">Keterangan</div>
                            <div class="text-muted">${(card.querySelector('.bg-light.border')?.textContent || card.textContent || '').trim().slice(0, 250)}...</div>

                            <div class="mt-4">
                                <a class="btn btn-primary w-100" href="{{ route('document.show', '__DOCID__') }}" target="_blank">Buka Detail</a>
                            </div>

                            <div class="mt-4">
                                <hr class="my-4" />
                                <div class="fw-bold mb-2">Daftar Akses (Shared Users)</div>
                                <div class="text-muted mb-3" id="accessTableLoading">Memuat daftar akses...</div>
                                <div id="accessTable" class="d-flex flex-column gap-2"></div>
                            </div>
                        </div>
                    `;

                    infoCanvasBody.innerHTML = tampilkan;

                    // render daftar akses (sharedUsers) via backend
                    try {
                        const docIdEl = container.querySelector('#__doc_id__');
                        const activeDocId = (docIdEl && docIdEl.textContent) ? docIdEl.textContent.trim() : docId;

                        // owner/admin bisa kelola
                        const isOwner = Number('{{ auth()->check() ? ($d ?? null) : 0 }}') === 0; // placeholder, akan di-set lewat backend

                        // fetch data shares JSON (relasi sharedUsers) dari backend
                        fetch(`/documents/${activeDocId}/shares/list`)
                            .then((r) => {
                                if (!r.ok) throw new Error('fetch shares failed');
                                return r.json();
                            })
                            .then((data) => {
                                const accessList = infoCanvasBody.querySelector('#accessList');
                                const loading = infoCanvasBody.querySelector('#accessLoading, #accessTableLoading');
                                if (loading) loading.remove();

                                if (!accessList) return;

                                const isOwnerOrAdmin = !!data.canManage;
                                const manageBox = infoCanvasBody.querySelector('#accessManage');
                                if (manageBox) manageBox.style.display = isOwnerOrAdmin ? '' : 'none';

                                const users = Array.isArray(data.users) ? data.users : [];

                                if (users.length === 0) {
                                    accessList.innerHTML = '<div class="text-muted">Belum ada akses.</div>';
                                    return;
                                }

                                accessList.innerHTML = '';

                                users.forEach((u) => {
                                    accessList.innerHTML += `
                                        <div class="d-flex align-items-center justify-content-between gap-2 border rounded-3 p-2">
                                            <div>
                                                <div class="fw-semibold">${u.name || '-'}</div>
                                                <div class="text-muted" style="font-size: 13px;">${u.email || '-'}</div>
                                            </div>
                                            ${data.canManage ? `
                                                <form method="POST" action="${u.removeUrl}" class="m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus akses user ini?')">Hapus</button>
                                                </form>
                                            ` : ''}
                                        </div>
                                    `;
                                });
                            })
                            .catch(() => {
                                const accessList = infoCanvasBody.querySelector('#accessList');
                                if (accessList) accessList.innerHTML = '<div class="text-muted">Gagal memuat daftar akses.</div>';
                            });
                    } catch (e) {}
                })
                })
                .catch(() => {
                    infoCanvasBody.innerHTML = 'Gagal memuat informasi dokumen.';
                });
        });
    }

    // Update file name in upload modal
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


