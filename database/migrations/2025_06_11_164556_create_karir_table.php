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
        Schema::create('karir', function (Blueprint $table) {
            $table->id('id_karir');
            $table->string('nama_karir');
            $table->unsignedBigInteger('id_kepribadian');
            $table->timestamps();
        
            $table->foreign('id_kepribadian')->references('id_kepribadian')->on('kepribadian')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karir');
    }
};
