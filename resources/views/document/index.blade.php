<style>
    body{
        font-family:'Segoe UI',sans-serif;
    }

    .header-link{
        color:#334155 !important;
        text-decoration:none;
        font-weight:600;
    }

    .header-link:hover{
        color:#2563eb !important;
    }

    /* HEADER TABLE */
    .table thead{
        background:#f8fafc !important; /* Kembalikan ke warna abu-abu terang semula */
    }

    .table thead th{
        background:#f8fafc !important;
        color:#334155 !important; /* Warna teks gelap */
        font-size:16px;
        font-weight:700;
        border:none;
        padding:18px;
        text-align:center !important; /* Memastikan header teks di tengah */
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
        padding:18px;
        font-size:15px;
        color:#1e293b;
        border-bottom:1px solid #e5e7eb;
        text-align:center !important; /* Memastikan semua cell td default di tengah */
    }

    .table tbody tr:hover{
        background:#f8fafc;
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

    .badge-category{
        display:inline-flex;
        align-items:center;
        max-width: 220px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;

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

    /* RESPONSIVE CSS PERBAIKAN */
    @media (max-width: 992px){
        .w-64{ width: 13rem; }
    }

    @media (max-width: 768px){
        .w-64{ width: 100%; }
        main{ padding: 1rem !important; }
        .d-flex.min-vh-100{ flex-direction: column; }
        .page-title { font-size: 28px; }
        .modal-content { padding: 20px; border-radius: 20px; }
    }

    @media (max-width: 576px) {
        .offcanvas {
            width: 100% !important;
        }
        .btn-upload {
            width: 100%;
            text-align: center;
        }
    }
</style>

<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

        @include('components.sidebar')

        <main class="flex-1 min-w-0">
            <div class="p-4 p-md-6">

                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                    <div>
                        <h1 class="page-title">📄 Daftar Dokumen</h1>
                        <p class="sub-title">Kelola dan akses dokumen perusahaan</p>
                    </div>

                    <button class="btn btn-primary btn-upload"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#uploadModal">
                        + Upload Dokumen
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-3 mb-4">
                    <form method="GET" action="{{ route('document.index') }}">
                        <div class="row g-3 align-items-center">

                            <div class="col-12 col-md-3">
                                <select name="category_id" class="form-select rounded-lg py-2 w-full">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-7">
                                <input type="text"
                                       name="search"
                                       value="{{ request('search') }}"
                                       placeholder="Cari dokumen..."
                                       class="form-control rounded-lg py-2 w-full">
                            </div>

                            <div class="col-12 col-md-2">
                                <button type="submit" class="w-full btn btn-primary py-2" style="background: #2563eb; border: none;">
                                    Cari
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="card main-card">
                    <div class="card-body p-0 p-md-4">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0" style="min-width: 850px;">
                                <thead>
                                    <tr>
                                        <th style="width: 30%;">
                                            <a href="{{ route('document.index', array_merge(request()->except('sort','order'), ['sort'=>'nama', 'order'=>(request('sort')=='nama' && request('order')=='asc') ? 'desc' : 'asc'])) }}" class="header-link d-inline-flex align-items-center justify-content-center">
                                                Nama Dokumen
                                            </a>
                                        </th>
                                        <th style="width: 15%;">Kategori</th>
                                        <th style="width: 20%;">Pemilik</th>
                                        <th style="width: 15%;">
                                            <a href="{{ route('document.index', array_merge(request()->except('sort','order'), ['sort'=>'tanggal', 'order'=>(request('sort')=='tanggal' && request('order')=='asc') ? 'desc' : 'asc'])) }}" class="header-link d-inline-flex align-items-center justify-content-center">
                                                Tanggal Diubah
                                            </a>
                                        </th>
                                        <th style="width: 10%;">Ukuran File</th>
                                        <th style="width: 10%;">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($documents as $index => $d)
                                    <tr>
                                        <!-- Nama Dokumen (Rata Kiri Sejajar Vertikal) -->
                                        <td class="text-start">
                                            @php
                                                $ext = strtolower(pathinfo($d->file ?? '', PATHINFO_EXTENSION));
                                                $iconClass = 'bi-file-earmark';
                                                $colorClass = 'file-default';

                                                if($ext == 'pdf'){ $iconClass = 'bi-file-earmark-pdf-fill'; $colorClass = 'file-pdf'; }
                                                elseif(in_array($ext,['doc','docx'])){ $iconClass = 'bi-file-earmark-word-fill'; $colorClass = 'file-doc'; }
                                                elseif(in_array($ext,['xls','xlsx'])){ $iconClass = 'bi-file-earmark-excel-fill'; $colorClass = 'file-xls'; }
                                                elseif(in_array($ext,['png','jpg','jpeg','gif'])){ $iconClass = 'bi-image-fill'; $colorClass = 'file-img'; }
                                            @endphp

                                            <div class="document-cell justify-content-start ps-3 ps-md-5">
                                                <div class="file-icon {{ $colorClass }}">
                                                    <i class="bi {{ $iconClass }}"></i>
                                                </div>
                                                <div class="text-truncate" style="max-width: 220px;">
                                                    <a href="{{ route('document.view',$d->id) }}"
                                                       target="_blank"
                                                       rel="noopener noreferrer"
                                                       class="text-decoration-none fw-semibold text-dark"
                                                       title="{{ $d->nama_dokumen }}">
                                                        {{ $d->nama_dokumen }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="badge-category mx-auto">
                                                {{ optional($d->category)->nama_kategori ?? '-' }}
                                            </span>
                                        </td>

                                        <td>
                                            <div class="text-truncate mx-auto" style="max-width: 150px;" title="{{ optional($d->user)->name }}">
                                                {{ optional($d->user)->name ?? '-' }}
                                            </div>
                                        </td>

                                        <td>
                                            {{ optional($d->updated_at)->format('d M Y') }}
                                        </td>

                                        <td>
                                            @php
                                                $bytes = $d->file_size ?? null;
                                                if ($bytes === null) {
                                                    $display = '-';
                                                } else {
                                                    $bytes = (float) $bytes;
                                                    $kb = $bytes / 1024;
                                                    $mb = $kb / 1024;
                                                    $display = ($mb < 1) ? round($kb, 2) . ' KB' : round($mb, 2) . ' MB';
                                                }
                                            @endphp
                                            {{ $display }}
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="action-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-three-dots"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('document.view', $d->id) }}" target="_blank" rel="noopener noreferrer">
                                                            <i class="bi bi-eye"></i><span>Lihat Dokumen</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('document.download',$d->id) }}">
                                                            <i class="bi bi-download"></i><span>Download</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button type="button" class="dropdown-item" data-bs-target="#renameModal" data-bs-toggle="modal" data-doc-id="{{ $d->id }}" data-doc-name="{{ $d->nama_dokumen }}">
                                                            <i class="bi bi-pencil"></i><span>Ganti Nama</span>
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#infoCanvas" data-doc-id="{{ $d->id }}">
                                                            <i class="bi bi-info-circle"></i><span>Informasi File</span>
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <form action="{{ route('document.destroy',$d->id) }}" method="POST" class="m-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Yakin hapus dokumen?')" class="dropdown-item text-danger">
                                                                <i class="bi bi-trash"></i><span>Hapus</span>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="empty-state">
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
            <div class="offcanvas offcanvas-end" tabindex="-1" id="infoCanvas" aria-labelledby="infoCanvasLabel" style="width: 460px;">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title fw-bold" id="infoCanvasLabel">ℹ️ Informasi Dokumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div id="infoCanvasBody" class="text-muted">Pilih dokumen untuk melihat detail.</div>
                </div>
            </div>

            <!-- MODAL rename -->
            <div class="modal fade" id="renameModal" tabindex="-1">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content position-relative">
                        <button type="button" class="btn-close position-absolute top-0 end-0 m-4" data-bs-dismiss="modal"></button>
                        <h1 class="fw-bold mb-2">✏️ Ganti Nama Dokumen</h1>
                        <p class="text-muted mb-4">Perbarui nama dokumen yang dipilih.</p>

                        <form method="POST" id="renameForm">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="fw-semibold mb-2">Nama Dokumen</label>
                                <input type="text" name="nama_dokumen" id="renameInput" class="form-control form-control-lg rounded-4" required maxlength="255">
                            </div>
                            <button type="submit" class="btn btn-submit mt-2 text-white w-100">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- MODAL UPLOAD -->
            <div class="modal fade" id="uploadModal" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content position-relative">
                        <button type="button" class="btn-close position-absolute top-0 end-0 m-4" data-bs-dismiss="modal"></button>
                        <h1 class="fw-bold mb-2">Upload Dokumen</h1>
                        <p class="text-muted mb-4">Upload dan simpan dokumen perusahaan</p>

                        <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="nama_dokumen" id="uploadNamaDokumen">

                            <div class="mb-4">
                                <label class="fw-semibold mb-2">Kategori Dokumen</label>
                                <select name="category_id" class="form-select form-select-lg rounded-4" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="fw-semibold mb-2">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control rounded-4" rows="4" placeholder="Masukkan deskripsi dokumen..."></textarea>
                            </div>

                            <div class="upload-area mt-4">
                                <h4>📁 Pilih File Dokumen</h4>
                                <p>Upload PDF, DOC, XLS, dan lainnya</p>
                                <div class="file-upload-box flex-wrap justify-content-center gap-2 p-3">
                                    <label for="fileInput" class="custom-file-btn mb-0">Pilih File</label>
                                    <span id="file-name" class="file-name text-center w-100 d-block mt-2">Belum ada file dipilih</span>
                                    <input type="file" id="fileInput" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg" hidden required>
                                    <p class="text-muted mt-2 mb-0 w-100" style="font-size: 13px;">Maksimal upload: 10 MB</p>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-submit mt-4 text-white w-100">Upload Dokumen</button>
                        </form>
                    </div>
                </div>
            </div>

            <script>
            document.addEventListener('DOMContentLoaded', function () {
                const renameModalEl = document.getElementById('renameModal');
                const renameInputEl = document.getElementById('renameInput');
                const renameFormEl = document.getElementById('renameForm');

                if (renameModalEl && renameInputEl && renameFormEl) {
                    document.querySelectorAll('[data-bs-target="#renameModal"]').forEach(btn => {
                        btn.addEventListener('click', function () {
                            const docId = this.getAttribute('data-doc-id');
                            const docName = this.getAttribute('data-doc-name') || '';
                            renameInputEl.value = docName;
                            renameFormEl.setAttribute('action', `/document/${docId}`);
                        });
                    });
                }

                const infoCanvasBody = document.getElementById('infoCanvasBody');

                document.querySelectorAll('[data-doc-id]').forEach(button => {
                    button.addEventListener('click', function () {
                        const docId = this.dataset.docId;
                        if(!docId) return;
                        
                        infoCanvasBody.innerHTML = 'Memuat informasi dokumen...';

                        fetch(`/document/${docId}`)
                            .then(response => response.text())
                            .then(html => {
                                const parser = new DOMParser();
                                const doc = parser.parseFromString(html, 'text/html');
                                const nama = doc.querySelector('h2')?.textContent.trim() ?? '-';

                                let kategori = '-'; let tanggal = '-'; let ukuran = '-'; let pemilik = '-';

                                doc.querySelectorAll('strong').forEach(item => {
                                    const label = item.textContent.trim();
                                    const value = item.parentElement.textContent.replace(label,'').trim();
                                    if(label.includes('Kategori')){ kategori = value; }
                                    if(label.includes('Tanggal Upload')){ tanggal = value; }
                                    if(label.includes('Ukuran File')){ ukuran = value; }
                                    if(label.includes('Pemilik')){ pemilik = value; }
                                });

                                infoCanvasBody.innerHTML = `
                                    <div class="p-1">
                                        <div class="mb-3">
                                            <div style="font-size: 28px; font-weight: 700; color:#0f172a; line-height:1.2; word-break: break-word;">${nama || '-'}</div>
                                            <div class="text-muted">${kategori ? 'Kategori: ' + kategori : 'Kategori: -'}</div>
                                        </div>
                                        <div class="bg-light border rounded-4 p-3 mb-4">
                                            <div class="fw-bold mb-1">Ringkasan</div>
                                            <div class="d-flex justify-content-between gap-3 flex-wrap"><div class="text-muted">Pemilik</div><div class="fw-semibold">${pemilik || '-'}</div></div>
                                            <div class="d-flex justify-content-between gap-3 flex-wrap"><div class="text-muted">Tanggal upload</div><div class="fw-semibold">${tanggal || '-'}</div></div>
                                            <div class="d-flex justify-content-between gap-3 flex-wrap"><div class="text-muted">Ukuran</div><div class="fw-semibold">${ukuran || '-'}</div></div>
                                        </div>
                                        <hr class="my-4" />
                                        <h6 class="fw-bold mb-3">Akses</h6>
                                        <div class="text-muted mb-3" id="accessLoading">Memuat daftar akses...</div>
                                        <div class="mb-3" id="accessList"></div>
                                        <hr class="my-4" />
                                        <h6 class="fw-bold mb-3">Detail File</h6>
                                        <div class="d-flex justify-content-between gap-3 mb-2"><div class="text-muted">Jenis file</div><div class="fw-semibold">-</div></div>
                                        <div class="d-flex justify-content-between gap-3 mb-2"><div class="text-muted">Ukuran</div><div class="fw-semibold">${ukuran || '-'}</div></div>
                                        <div class="d-flex justify-content-between gap-3 mb-2"><div class="text-muted">Pemilik</div><div class="fw-semibold">${pemilik || '-'}</div></div>
                                        <div class="d-flex justify-content-between gap-3"><div class="text-muted">Terakhir dimodifikasi</div><div class="fw-semibold">${tanggal || '-'}</div></div>
                                        <hr class="my-4" />
                                        <div class="fw-bold mb-2">Keterangan</div>
                                        <div class="text-muted" style="word-break: break-word;">${doc.querySelector('.bg-light.border')?.textContent?.trim() || doc.body.textContent.trim().slice(0,250)}...</div>
                                        <div class="mt-4"><a class="btn btn-primary w-100" href="/document/${docId}" target="_blank">Buka Detail</a></div>
                                        <div class="mt-4">
                                            <hr class="my-4" />
                                            <div class="fw-bold mb-2">Daftar Akses (Shared Users)</div>
                                            <div id="accessTable" class="d-flex flex-column gap-2"></div>
                                        </div>
                                    </div>
                                `;

                                const accessListEl = infoCanvasBody.querySelector('#accessList');
                                fetch(`/documents/${docId}/shares/list`)
                                    .then((r) => r.ok ? r.json() : truncate)
                                    .then((data) => {
                                        const loading = infoCanvasBody.querySelector('#accessLoading');
                                        if (loading) loading.remove();
                                        const users = data && Array.isArray(data.users) ? data.users : [];
                                        const accessTable = infoCanvasBody.querySelector('#accessTable');

                                        if (users.length === 0) {
                                            if(accessListEl) accessListEl.innerHTML = '<div class="text-muted">Belum ada akses.</div>';
                                            return;
                                        }
                                        if(accessListEl) accessListEl.innerHTML = '';

                                        users.forEach((u) => {
                                            const item = document.createElement('div');
                                            item.className = 'd-flex align-items-center justify-content-between gap-2 border rounded-3 p-2 flex-wrap';
                                            item.innerHTML = `<div><div class="fw-semibold">${u.name || '-'}</div><div class="text-muted" style="font-size: 13px;">${u.email || '-'}</div></div>`;
                                            if(accessListEl) accessListEl.appendChild(item);
                                            if (accessTable) accessTable.appendChild(item.cloneNode(true));
                                        });
                                    }).catch(() => {
                                        if (accessListEl) accessListEl.innerHTML = '<div class="text-muted">Gagal memuat akses.</div>';
                                    });
                            })
                            .catch(error => {
                                console.error(error);
                                infoCanvasBody.innerHTML = '<div class="text-danger">Gagal memuat informasi dokumen.</div>';
                            });
                    });
                });

                const input = document.getElementById('fileInput');
                const fileNameEl = document.getElementById('file-name');

                if(input && fileNameEl){
                    input.addEventListener('change', function(){
                        const fileName = this.files.length ? this.files[0].name : 'Belum ada file dipilih';
                        fileNameEl.innerText = fileName;
                        const uploadNameInput = document.querySelector('#uploadModal input[name="nama_dokumen"]');
                        if (uploadNameInput && fileName && fileName !== 'Belum ada file dipilih') {
                            uploadNameInput.value = fileName;
                        }
                    });
                }
            });
            </script>
        </main>
    </div>
</x-app-layout>