<h1>Daftar Dokumen</h1>

<a href="/dokumen/create">Upload Dokumen</a>

<table border="1">
    <tr>
        <th>Nama</th>
        <th>File</th>
    </tr>

    @foreach($documents as $d)
    <tr>
        <td>{{ $d->nama_dokumen }}</td>
        <td>
            <a href="{{ asset('storage/'.$d->file) }}" target="_blank">
                Lihat
            </a>
        </td>
    </tr>
    @endforeach

</table>