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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->unsignedBigInteger('transaksi_id'); // Kolom transaksi_id sebagai foreign key ke Tabel Transaksi
            $table->unsignedBigInteger('menu_id'); // Kolom menu_id sebagai foreign key ke Tabel Menu
            $table->integer('jumlah'); // Kolom jumlah
            $table->decimal('subtotal', 10, 2); // Kolom subtotal dengan dua digit di belakang koma
            // Definisi foreign keys
            $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade');
          $table->foreign('menu_id')->references('id')->on('menu')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
