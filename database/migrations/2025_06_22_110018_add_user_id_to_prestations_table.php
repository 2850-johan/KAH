<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Migration de la clé étrangère user_id dans la table prestations
    // Cette migration ajoute une colonne user_id qui référence la table users
    // La contrainte onDelete('set null') permet de mettre user_id à null si l'utilisateur est supprimé
    // La colonne user_id est nullable, ce qui signifie qu'elle peut être vide
    // Cela permet de lier une prestation à un utilisateur, mais sans rendre cette relation obligatoire.
    public function up(): void
{
    Schema::table('prestations', function (Blueprint $table) {
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prestations', function (Blueprint $table) {
            //
        });
    }
};
