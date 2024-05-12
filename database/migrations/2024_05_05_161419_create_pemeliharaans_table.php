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
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->id();
            $table->string('id_baran');
            $table->string('nama_baran');
            $table->string('nomor_register');
            $table->string('jumlah');
            $table->date('tgl_pemeliharaan');
            $table->string('kondisi');
            $table->string('tanda_tangan_internal');
            $table->string('tanda_tangan_eksternal');
            $table->string('nama_atasan_petugas_pemeliharaan');
            $table->string('foto_1');
            $table->string('foto_2');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaans');
    }
};
