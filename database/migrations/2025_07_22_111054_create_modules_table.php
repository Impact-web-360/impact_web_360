
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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_id')->constrained()->onDelete('cascade'); // Clé étrangère
            $table->string('title');
            $table->string('file_path')->nullable(); // Chemin vers le fichier du module (ex: PDF)
            $table->string('video_path')->nullable(); // Chemin vers la vidéo du module
            $table->string('duration')->nullable(); // Ex: "30min"
            $table->integer('order')->default(0); // Pour trier les modules
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};