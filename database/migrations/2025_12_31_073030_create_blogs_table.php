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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); 
            $table->date('tanggal_publish')->nullable(); 
            $table->string('gambar_utama')->nullable(); 
            $table->string('gambar_pendukung')->nullable(); 
            $table->string('subjudul1')->nullable();
            $table->text('deskripsi1')->nullable();
            $table->string('subjudul2')->nullable();
            $table->text('deskripsi2')->nullable();
            $table->string('subjudul3')->nullable();
            $table->text('deskripsi3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
