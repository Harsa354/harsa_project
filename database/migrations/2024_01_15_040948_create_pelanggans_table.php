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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('nama'); // Kolom nama
            $table->string('email')->unique(); // Kolom email (unik)
            $table->string('nomor_telepon'); // Kolom nomor_telepon
            $table->text('alamat'); // Kolom alamat
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
