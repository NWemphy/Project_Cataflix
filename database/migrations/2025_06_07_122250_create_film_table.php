<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('film', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('year');
            $table->string('poster')->nullable();
            $table->text('description')->nullable();
            $table->string('director')->nullable();
            $table->string('duration')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
