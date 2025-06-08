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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('pengguna')->onDelete('cascade');
            $table->foreignId('movie_id')->constrained('film')->onDelete('cascade');
            $table->unsignedTinyInteger('rating'); // 1-5 misalnya
            $table->text('review')->nullable();
            $table->timestamps();
        
            $table->unique(['user_id', 'movie_id']); // satu review per user per film
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
