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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('career_id')->nullable()->constrained('careers')->onDelete('cascade');        
            $table->decimal('prior', 8, 6)->nullable();         // opsional
            $table->decimal('likehood', 8, 6)->nullable();    // opsional
            $table->decimal('probabilitas', 8, 6)->nullable();  // nilai akhir
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
