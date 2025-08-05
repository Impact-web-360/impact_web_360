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
        Schema::create('replays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_evenement')->constrained('evenements')->onDelete('cascade');
            $table->string('titre');
            $table->text('description');
            $table->string('video_path'); 
            $table->string('presentateur_nom'); 
            $table->string('presentateur_poste');
            $table->string('presentateur_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replays');
    }
};
