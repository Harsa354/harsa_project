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
        Schema::create('meja', function (Blueprint $table) { {
                $table->id(); // Kolom id sebagai primary key
                $table->string('nomor_meja'); // Kolom nomor_meja
                $table->integer('kapasitas'); // Kolom kapasitas
                $table->string('status'); // Kolom status

                $table->timestamps(); // Kolom created_at dan updated_at
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meja');
    }
};
