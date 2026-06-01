<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            // Pastikan file_size ada (dan bertipe numerik)
            if (!Schema::hasColumn('documents', 'file_size')) {
                $table->unsignedBigInteger('file_size')->nullable()->after('file');
            }

            // Pastikan user_id ada
            // Catatan: dokument ini sudah membuat kolom user_id pada migration sebelumnya.
            // Namun jika kolom belum ada (misal karena skenario rollback/migration berbeda),
            // migration ini akan membuatnya juga.
            if (!Schema::hasColumn('documents', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('category_id');
            }

            // Pastikan tidak ada FK ganda jika sebelumnya sudah ada.
            // Laravel tidak menyediakan cek FK secara native, jadi kita hindari penambahan FK lagi.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Migration ini bersifat "fix"/penyesuaian.
        // Jangan menghapus kolom `user_id`/`file_size` saat rollback,
        // karena kemungkinan besar kolom tersebut sudah dibuat oleh migration lain
        // (misal 083152/083201). Menghapus di sini berisiko membuat skema rusak.
    }
};


