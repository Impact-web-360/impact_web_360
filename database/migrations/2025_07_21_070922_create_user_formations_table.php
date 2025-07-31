// database/migrations/YYYY_MM_DD_HHMMSS_create_user_formations_table.php

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
            $table->id(); // Identifiant unique pour chaque enregistrement dans la table pivot
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Clé étrangère vers la table 'users'
            $table->foreignId('formation_id')->constrained('formations')->onDelete('cascade'); // Clé étrangère vers la table 'formations'

            $table->string('status')->default('pending'); // Statut du paiement: 'pending', 'paid', 'failed', 'refunded', 'awaiting_webhook_confirmation'
            $table->timestamp('paid_at')->nullable(); // Date et heure du paiement réussi
            $table->decimal('amount_paid', 10, 2)->nullable(); // Montant réellement payé
            $table->boolean('auto_renewal_enabled')->default(false); // Indique si le renouvellement automatique est activé
            $table->string('fedapay_transaction_id')->nullable()->unique(); // ID de transaction Fedapay pour référence

            $table->timestamps(); // Colonnes created_at et updated_at

            // Assure qu'un utilisateur ne peut acheter la même formation qu'une seule fois (ou avoir une seule entrée active)
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