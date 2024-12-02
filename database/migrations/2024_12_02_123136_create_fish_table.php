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
        Schema::create('fish', function (Blueprint $table) {
            $table->id();
            $table->string("species", 64);
            $table->decimal("lengthInCm", 8, 3)->nullable();
            $table->integer("weightInGrams")->nullable();
            $table->boolean("released");
            $table->string("caughtWith", 64);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fish');
    }
};
