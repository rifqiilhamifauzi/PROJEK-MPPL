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
    Schema::create('registrations', function (Blueprint $table) {
        $table->id();

        // FK ke users
        $table->foreignId('user_id')
              ->constrained('users')
              ->onDelete('cascade');

        // FK ke events
        $table->foreignId('event_id')
              ->constrained('events')
              ->onDelete('cascade');

        // status pendaftaran
        // pending -> baru daftar
        // disetujui -> diterima
        // ditolak -> tidak diterima
        $table->enum('status', ['pending', 'disetujui', 'ditolak'])
              ->default('pending');

        // Waktu mendaftar
        $table->timestamp('tanggal_daftar')
              ->useCurrent();

        // Opsional catatan
        $table->text('catatan')->nullable();

        $table->timestamps();

        // Agar user tidak daftar 2 kali untuk event yang sama
        $table->unique(['user_id', 'event_id']);
    });
}

public function down(): void
{
    Schema::dropIfExists('registrations');
}

};
