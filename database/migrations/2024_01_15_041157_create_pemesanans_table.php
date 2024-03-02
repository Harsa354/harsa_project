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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->unsignedBigInteger('meja_id'); // Kolom meja_id sebagai foreign key ke Tabel Meja
            $table->date('tanggal_pemesanan'); // Kolom tanggal_pemesanan
            $table->time('jam_mulai'); // Kolom jam_mulai
            $table->time('jam_selesai'); // Kolom jam_selesai
            $table->string('nama_pemesan'); // Kolom nama_pemesan
            $table->integer('jumlah_pelanggan'); // Kolom jumlah_pelanggan
            // Definisi foreign key
            $table->foreign('meja_id')->references('id')->on('meja')->onDelete('cascade');
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
