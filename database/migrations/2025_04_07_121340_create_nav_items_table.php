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
        Schema::create('nav_items', function (Blueprint $table) {
            $table->id();
            $table->string('label'); // Texte affiché dans la navbar
            $table->string('url');   // Lien
            $table->integer('order')->default(0); // Pour ordonner les items
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav_items');
    }
};
