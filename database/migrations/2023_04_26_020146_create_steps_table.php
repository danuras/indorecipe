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
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->json('images');
            $table->unsignedBigInteger('recipe_id');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade')->onUpdate('cascade');
            $table->index('recipe_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('steps');
    }
};
