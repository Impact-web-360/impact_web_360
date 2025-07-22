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
        Schema::create('emploies', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('localisation')->nullable();
            $table->string('logo')->nullable(); // Assuming 'logo' is a file path or URL
            $table->string('promoteur');
            $table->string('lien');
            $table->enum('type', ['stage', 'freelance', 'temps plein', 'temps partiel', 'contrat', 'autre']);
            $table->enum('categorie', ['marketing', 'communication','design', 'commerce', 'informatique', 'finance', 'ressources humaines', 'autre']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emploies');
    }
};
