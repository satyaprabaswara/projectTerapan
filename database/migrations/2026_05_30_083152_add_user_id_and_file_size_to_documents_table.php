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
            // Idempotent: hanya menambah jika kolom belum ada
            if (!Schema::hasColumn('documents', 'user_id')) {
                $table->foreignId('user_id')->nullable()->after('id');
            }

            if (!Schema::hasColumn('documents', 'file_size')) {
                $table->unsignedBigInteger('file_size')->nullable()->after('file');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            if (Schema::hasColumn('documents', 'file_size')) {
                $table->dropColumn('file_size');
            }

            if (Schema::hasColumn('documents', 'user_id')) {
                // DropColumn biasanya akan menghapus FK terkait bila ada.
                $table->dropColumn('user_id');
            }
        });
    }
};


