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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('images');
            $table->unsignedInteger('portion');
            $table->time('cooking_time');
            $table->longText('description');
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('origin_id')->references('id')->on('origins')->onDelete('cascade')->onUpdate('cascade');
            $table->index('origin_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->index('category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
