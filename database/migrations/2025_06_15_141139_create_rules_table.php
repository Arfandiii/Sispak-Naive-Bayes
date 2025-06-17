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
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rule', 10)->nullable();
            $table->foreignId('career_id')->constrained('careers')->onDelete('cascade');
            $table->foreignId('career_statement_id')->constrained('career_statements')->onDelete('cascade');
            $table->unique(['career_id', 'career_statement_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};
