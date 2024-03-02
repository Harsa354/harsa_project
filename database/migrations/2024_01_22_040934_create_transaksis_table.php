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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->date('tanggal'); // Kolom tanggal
            $table->decimal('total_harga', 10, 2); // Kolom total_harga dengan dua digit di belakang koma
            $table->string('metode_pembayaran'); // Kolom metode_pembayaran
            $table->text('keterangan')->nullable(); // Kolom keterangan (nullable) 
            $table->timestamps(); // Kolom created_at dan updated_a
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
