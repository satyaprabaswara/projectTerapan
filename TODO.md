# TODO - Perbaiki Halaman Kelola Dokumen

## Status: In progress

### 1) Audit & rute
- [x] Cek view yang akan diperbaiki: `resources/views/document/index.blade.php`
- [x] Cek route `document.*` yang dipakai di view.

### 2) Perbaiki `document.index` (UI/UX & konsistensi)
- [x] Rapikan dropdown aksi: hilangkan item yang pakai `alert()` untuk fitur belum ada (ubah menjadi disabled).
- [x] Amankan perhitungan ukuran file saat `file_size` null.
- [x] Hilangkan JS re-initialize dropdown yang berpotensi bentrok.

### 3) Kontrol akses dokumen (GDrive-like)
- [x] Tambah kolom `documents.visibility`
- [x] Tambah tabel `document_shares`
- [x] Tambah relasi model Document ↔ DocumentShare
- [x] Update `DocumentController@index/show/view/download`
  - admin: lihat semua
  - private: hanya pemilik
  - share: pemilik + user yang di-share
- [x] Set default visibility saat upload: `private`

### 4) Testing singkat
- [x] Jalankan `php artisan test`
- [ ] Pastikan test `ExampleTest` lulus (sementara gagal karena `/` memakai middleware auth)

