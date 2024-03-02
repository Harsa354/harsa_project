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
        Schema::create('jenis', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('nama_jenis'); // Kolom nama_jenis
            $table->unsignedBigInteger('kategori_id'); // Kolom kategori_id sebagai foreign key ke Tabel Kategori Makanan

            // Definisi foreign key
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis');
    }
};
