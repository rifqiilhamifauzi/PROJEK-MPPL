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
    Schema::create('users', function (Blueprint $table) {
        $table->id();

        $table->string('name', 100);
        $table->string('email', 150)->unique();
        $table->string('password');

        $table->enum('role', ['admin', 'member'])->default('member');
        $table->enum('status_akun', ['active', 'inactive', 'banned'])->default('active');

        $table->timestamp('email_verified_at')->nullable();
        $table->rememberToken();

        $table->timestamps();
    });
}

};
