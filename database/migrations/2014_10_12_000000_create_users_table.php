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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->enum('type',['participant','intervenant','admin']);
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->string('telephone')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('biographie')->nullable();
            $table->string('theme')->default('dark');
            $table->string('langue_de_travail')->default('fr');
            $table->string('facebook')->nullable();
                $table->string('whatsapp')->nullable();
                $table->string('linkedin')->nullable();
                $table->string('instagram')->nullable();
                $table->string('tiktok')->nullable();
                $table->string('youtube')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
