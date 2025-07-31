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
        Schema::create('user_formations', function (Blueprint $table) {
            $table->id();
            // Clé étrangère vers la table users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Clé étrangère vers la table formations
            $table->foreignId('formation_id')->constrained('formations')->onDelete('cascade');

            // Ajoutez des colonnes pour le statut de paiement et l'ID de transaction
            $table->string('payment_status')->default('pending'); // 'pending', 'completed', 'failed', 'refunded'
            $table->string('payment_method')->nullable(); // 'momo', 'card'
            $table->string('transaction_id')->nullable()->unique(); // ID de transaction unique de la passerelle
            $table->decimal('paid_amount', 8, 2)->nullable(); // Le montant réellement payé

            $table->timestamps();

            // Assure qu'un utilisateur ne peut acheter qu'une seule fois la même formation
            $table->unique(['user_id', 'formation_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_formations');
    }
};