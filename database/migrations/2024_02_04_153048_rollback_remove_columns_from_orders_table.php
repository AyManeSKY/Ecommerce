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
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('telephone');
            $table->text('adresse');
            $table->json('articles_commandes');
            $table->decimal('montant_total');
            $table->string('type_carte_credit');
            $table->string('numero_carte_credit');
            $table->string('statut');
            $table->date('date_commande');
            $table->string('identifiant_transaction');
            $table->text('commentaires');
            $table->string('source_commande');
        });
    }
};
