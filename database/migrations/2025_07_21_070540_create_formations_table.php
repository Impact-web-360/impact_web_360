
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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Pour le chemin de l'image
            $table->json('objectives')->nullable(); // Pour les objectifs (stockés en JSON)
            $table->json('tools')->nullable(); // Pour les outils de travail (stockés en JSON)
            $table->integer('total_videos')->default(0);
            $table->decimal('price', 8, 2);
            $table->string('mentor')->nullable();
            $table->string('mentor_title')->nullable();
            $table->string('mentor_avatar')->nullable(); // Pour l'avatar du mentor
            $table->integer('mentor_reviews_count')->default(0);
            $table->text('mentor_bio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};