<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormationsTable extends Migration
{
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('mentor');
            $table->string('image')->nullable(); // Chemin de l'image
            $table->decimal('price', 8, 2);
            $table->float('rating', 2, 1)->default(0.0); // Note sur 5, ex: 4.5
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('formations');
    }
}