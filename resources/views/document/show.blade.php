<x-app-layout>

<div class="d-flex bg-light min-vh-100">

    <!-- Sidebar -->
    @include('components.sidebar')

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">

        <!-- Header -->
        <div class="mb-4">

            <h1 class="fw-bold"
                style="font-size: 48px;">

                📄 Detail Dokumen

            </h1>

            <p class="text-muted fs-5">
                Informasi lengkap dokumen yang dipilih.
            </p>

        </div>

        <!-- Card Detail -->
        <div class="bg-white rounded-5 shadow-sm border p-5">

            <div class="d-flex align-items-start gap-4">

                <!-- Icon File -->
                <div style="font-size: 90px;">

                    @php
                        $ext = pathinfo($document->file, PATHINFO_EXTENSION);

                        if($ext == 'pdf'){
                            $icon = '📕';
                        }
                        elseif($ext == 'doc' || $ext == 'docx'){
                            $icon = '📘';
                        }
                        elseif($ext == 'xls' || $ext == 'xlsx'){
                            $icon = '📗';
                        }
                        elseif($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg'){
                            $icon = '🖼️';
                        }
                        else{
                            $icon = '📄';
                        }
                    @endphp

                    {{ $icon }}

                </div>

                <!-- Info -->
                <div class="flex-grow-1">

                    <h2 class="fw-bold mb-4"
                        style="font-size: 42px;">

                        {{ $document->nama_dokumen }}

                    </h2>

                    <div class="mb-3 fs-5">

                        <strong>Kategori:</strong>

                        {{ $document->category->nama_kategori ?? '-' }}

                    </div>

                    <div class="mb-3 fs-5">

                        <strong>Tanggal Upload:</strong>

                        {{ $document->tanggal_upload }}

                    </div>

                    <div class="mb-3 fs-5">

                        <strong>Ukuran File:</strong>

                        {{ number_format(($document->file_size ?? 0) / 1024, 1) }} KB

                    </div>

                    <div class="mb-3 fs-5">

                        <strong>Pemilik:</strong>

                        {{ $document->user->name ?? '-' }}

                    </div>

                </div>

            </div>

            <!-- Divider -->
            <hr class="my-5">

            <!-- Deskripsi -->
            <div class="mb-4">

                <h4 class="fw-bold mb-3">

                    📝 Keterangan

                </h4>

                <div class="bg-light border rounded-4 p-4 fs-5">

                    {{ $document->deskripsi ?? 'Tidak ada deskripsi.' }}

                </div>

            </div>

            <!-- Button -->
            <div class="d-flex gap-3 mt-5">

                <!-- Download -->
                <a href="{{ route('document.download', $document->id) }}"
                   class="btn btn-success rounded-4 px-5 py-3 fw-semibold fs-5 shadow-sm">

                    ⬇️ Download Dokumen

                </a>

                <!-- Preview -->
<a href="{{ route('document.view', $document->id) }}"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="btn btn-primary rounded-4 px-5 py-3 fw-semibold fs-5 shadow-sm">

                    👁️ Lihat Dokumen

                </a>

                <!-- Back -->
                <a href="{{ route('document.index') }}"
                   class="btn btn-outline-secondary rounded-4 px-5 py-3 fw-semibold fs-5">

                    ← Kembali

                </a>

            </div>

        </div>

    </div>

</div>

</x-app-layout>