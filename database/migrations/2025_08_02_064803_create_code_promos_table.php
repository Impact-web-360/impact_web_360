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
        Schema::create('codes_promos', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Exemple : PROMO10
            $table->integer('reduction'); // en pourcentage : 10, 20, etc.
            $table->timestamp('expiration')->nullable();
            $table->boolean('actif')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codes_promos');
    }
};
