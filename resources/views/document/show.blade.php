<x-app-layout>

<div class="container py-5">

    <h1 class="fw-bold mb-4">
        Detail Dokumen
    </h1>

    <div class="card shadow border-0 rounded-4 p-4">
        <div class="row">
            <div class="col-md-2 text-center">
                @php
                    $extension = pathinfo($document->file, PATHINFO_EXTENSION);
                @endphp

                @if(in_array($extension, ['png', 'jpg', 'jpeg']))
                    <img
                        src="{{ asset('storage/'.$document->file) }}"
                        width="120"
                        class="rounded shadow-sm">

                @elseif($extension == 'pdf')
                    <img
                        src="https://cdn-icons-png.flaticon.com/512/337/337946.png"
                        width="100">

                @elseif(in_array($extension, ['doc', 'docx']))
                    <img
                        src="https://cdn-icons-png.flaticon.com/512/281/281760.png"
                        width="100">

                @elseif(in_array($extension, ['xls', 'xlsx', 'csv']))
                    <img
                        src="https://cdn-icons-png.flaticon.com/512/732/732220.png"
                        width="100">

                @else
                    <img
                        src="https://cdn-icons-png.flaticon.com/512/833/833524.png"
                        width="100">

                @endif
            </div>

            <div class="col-md-10">

                <h3 class="fw-bold">
                    {{ $document->nama_dokumen }}
                </h3>

                <p class="mb-2">
                    <strong>Kategori:</strong>
                    {{ $document->category->nama_kategori ?? '-' }}
                </p>

                <p class="mb-2">
                    <strong>Tanggal Upload:</strong>
                    {{ $document->tanggal_upload }}
                </p>

                <p class="mb-2">
                    <strong>Ukuran File:</strong>
                    @if($document->file_size >= 1024)
                        {{ round($document->file_size / 1024, 2) }} MB
                    @else
                        {{ $document->file_size }} KB
                    @endif
                </p>
            </div>
        </div>

        <hr class="my-4">
        <h5>Keterangan</h5>
        <div class="border rounded-3 p-3 bg-light">
            {{ $document->deskripsi ?? 'Tidak ada deskripsi.' }}
        </div>

        <a
            href="{{ route('document.download', $document->id) }}"
            class="btn btn-success mt-4">
            ⬇ Download Dokumen
        </a>
    </div>
</div>
</x-app-layout>