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
        Schema::create('intervenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evenement_id')->constrained()->onDelete('cascade');
            $table->string('nom');
            $table->string('fonction')->nullable();
            $table->text('biographie')->nullable();
            $table->string('theme')->nullable();
            $table->string('image')->nullable();
            // Ajout des colonnes pour les réseaux sociaux
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('linkedln')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('x')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intervenants');
    }
};
