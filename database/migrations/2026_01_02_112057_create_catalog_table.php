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
        Schema::create('catalog', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); 
            $table->string('harga')->nullable(); 
            $table->integer('seat')->nullable();
            $table->integer('jumlah')->nullable(); 
            $table->json('fasilitas')->nullable();
            $table->enum('type', ["SUV","Keluarga","Hiace/Elf","Mewah"]); 
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog');
    }
};
