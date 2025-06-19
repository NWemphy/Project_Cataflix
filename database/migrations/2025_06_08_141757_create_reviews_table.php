<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('film_id');
            $table->tinyInteger('rating'); // nilai rating (misalnya 1-5)
            $table->text('content'); // isi review
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('pengguna')->onDelete('cascade');
            $table->foreign('film_id')->references('id')->on('film')->onDelete('cascade');
            $table->unique(['user_id', 'film_id']); // 1 review per user per film
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
