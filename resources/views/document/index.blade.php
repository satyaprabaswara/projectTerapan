<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Dokumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📄 Daftar Dokumen</h2>
        <a href="{{ route('document.create') }}" class="btn btn-primary">
            + Upload Dokumen
        </a>
    </div>

    {{-- Search --}}
    <form method="GET" action="{{ route('document.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari dokumen..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary">Cari</button>
        </div>
    </form>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
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
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $d->nama_dokumen }}</td>
                        <td>{{ $d->category->nama ?? '-' }}</td>
                        <td class="text-center">
                            <a href="{{ asset('storage/'.$d->file) }}" target="_blank" class="btn btn-sm btn-info">
                                Lihat
                            </a>
                        </td>
                        <td class="text-center">

                            <a href="{{ route('document.download', $d->id) }}" class="btn btn-sm btn-success">
                                Download
                            </a>

                            <form action="{{ route('document.destroy', $d->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Tidak ada data dokumen
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

</div>

</body>
</html>