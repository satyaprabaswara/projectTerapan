<h1>Upload Dokumen</h1>

<form action="/dokumen" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="nama_dokumen" placeholder="Nama Dokumen" required>
    <br><br>

    <input type="file" name="file" required>
    <br><br>

    <button type="submit">Upload</button>
</form>