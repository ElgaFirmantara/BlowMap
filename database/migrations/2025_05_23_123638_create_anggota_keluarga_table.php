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
        Schema::create('anggota_keluarga', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('jenis_kelamin');
            $table->string('role')->nullable(); // bisa ganti ke enum(['ayah','ibu','anak','lainnya'])
            $table->unsignedBigInteger('kartu_keluarga_id');
            $table->timestamps();

            $table->foreign('kartu_keluarga_id')->references('id')->on('kartu_keluarga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_keluarga');
    }
};
