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
    Schema::create('attendances', function (Blueprint $table) {
        $table->id();

        // FK ke users
        $table->foreignId('user_id')
              ->constrained('users')
              ->onDelete('cascade');

        // FK ke events
        $table->foreignId('event_id')
              ->constrained('events')
              ->onDelete('cascade');

        // Waktu check-in
        $table->timestamp('check_in')->nullable();

        // Waktu check-out (opsional)
        $table->timestamp('check_out')->nullable();

        // Metode presensi: QR, manual, fingerprint, dll.
        $table->string('metode', 50)->nullable();

        // Keterangan: hadir, terlambat, izin, sakit, alfa
        $table->enum('keterangan', ['hadir', 'terlambat', 'izin', 'sakit', 'alfa'])
              ->default('hadir');

        $table->timestamps();

        // Membatasi 1 user hanya 1 presensi per event
        $table->unique(['user_id', 'event_id']);
    });
}

public function down(): void
{
    Schema::dropIfExists('attendances');
}

};
