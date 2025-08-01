<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            
            // Liens vers les autres tables
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('formation_id')->constrained()->onDelete('cascade');
            
            // Détails du montant
            $table->decimal('amount_xof', 10, 2)->comment('Montant de la formation en XOF.');
            $table->decimal('amount_monero', 16, 12)->comment('Montant converti en XMR.');
            
            // Informations spécifiques à Monero
            $table->string('monero_address')->unique()->comment('Adresse de paiement Monero générée.');
            $table->string('monero_payment_id')->unique()->nullable()->comment('Identifiant de paiement Monero.');
            $table->string('tx_hash')->nullable()->comment('Hash de la transaction après détection.');
            
            // Statut et date d'expiration
            $table->string('status')->default('pending')->comment('Statut du paiement (pending, paid, expired, etc.).');
            $table->timestamp('expires_at')->comment('Moment où le paiement est considéré comme expiré.');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}