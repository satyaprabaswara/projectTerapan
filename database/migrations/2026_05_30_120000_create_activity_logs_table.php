<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Misal: document.deleted, document.updated, document.created
            $table->string('action');

            // Deskripsi tampilan (misal jam user menghapus dokumen X)
            $table->text('description')->nullable();

            // Subjek terkait log (optional, tapi berguna)
            $table->string('subject_type')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();

            $table->timestamps();

            $table->index(['user_id', 'created_at']);
            $table->index(['action']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};

