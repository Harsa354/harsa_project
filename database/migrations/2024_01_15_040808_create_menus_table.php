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
        Schema::create('menu', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('nama_menu'); // Kolom nama_menu
            $table->decimal('harga', 10, 2); // Kolom harga dengan dua digit di belakang koma
            $table->string('image')->nullable(); // Kolom image (nullable untuk menyimpan path gambar, sesuaikan kebutuhan)
            $table->text('deskripsi'); // Kolom deskripsi
            $table->unsignedBigInteger('jenis_id'); // Kolom jenis_id sebagai foreign key ke Tabel Jenis Makanan

            // Definisi foreign key
            $table->foreign('jenis_id')->references('id')->on('jenis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
