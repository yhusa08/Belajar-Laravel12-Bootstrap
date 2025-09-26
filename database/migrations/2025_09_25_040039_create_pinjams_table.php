<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pinjam');
            $table->string('nama_peminjam');
            $table->string('judul_buku');
            $table->date('tanggal_kembali');
            $table->string('petugas');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pinjams');
    }
};