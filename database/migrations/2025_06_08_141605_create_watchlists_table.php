<?php

use App\Models\Pengguna;
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
        Schema::create('watchlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('Pengguna')->onDelete('cascade');
            $table->foreignId('movie_id')->constrained('film')->onDelete('cascade');
            $table->timestamps();
        
            $table->unique(['user_id', 'movie_id']); // Biar tidak duplikat
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watchlists');
    }
};
