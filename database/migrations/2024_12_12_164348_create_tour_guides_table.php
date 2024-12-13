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
        Schema::create('tour_guides', function (Blueprint $table) {
            $table->id();

            $table->foreignId('place_id')->constrained()->onDelete('cascade');
            $table->string('image');
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->integer('price');
            $table->string('phone');
            $table->string('total_guides');
            $table->string('total_years');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_guides');
    }
};
