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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama promo
            $table->text('deskripsi')->nullable(); // Deskripsi promo
            $table->text('syarat')->nullable(); // Deskripsi promo
            $table->string('flyer')->nullable(); // Nama file/folder gambar
            $table->date('berlaku_hingga')->nullable(); // Tanggal berlaku
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
