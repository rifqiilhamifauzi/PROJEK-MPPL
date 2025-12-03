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
    Schema::create('events', function (Blueprint $table) {
        $table->id();

        $table->string('nama_kegiatan', 150);
        $table->text('deskripsi')->nullable();

        $table->string('lokasi', 150)->nullable();

        $table->dateTime('tanggal_mulai');
        $table->dateTime('tanggal_selesai')->nullable();

        // status kegiatan: dibuka, ditutup, selesai
        $table->enum('status', ['dibuka', 'ditutup', 'selesai'])
              ->default('dibuka');

        // dibuat oleh admin
        $table->foreignId('created_by')
              ->constrained('users')
              ->onDelete('cascade');

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('events');
}

};
