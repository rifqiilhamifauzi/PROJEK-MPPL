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
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();

        // Foreign Key ke users
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

        // Data profil anggota
        $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
        $table->date('tanggal_lahir')->nullable();

        $table->string('alamat', 255)->nullable();
        $table->string('no_hp', 20)->nullable();
        $table->string('foto', 255)->nullable();

        $table->string('nta', 50)->nullable(); // Nomor Tanda Anggota
        $table->string('jurusan', 100)->nullable();
        $table->string('fakultas', 100)->nullable();

        $table->string('golongan_kepramukaan', 50)->nullable();
        $table->string('unit', 100)->nullable();

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('profiles');
}

};
