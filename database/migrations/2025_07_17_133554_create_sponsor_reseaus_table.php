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
        Schema::create('sponsor_reseaus', function (Blueprint $table) {
            $table->foreignId('id_sponsor')->constrained('sponsors');
            $table->foreignId('id_reseau')->constrained('reseaus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsor_reseaus');
    }
};
