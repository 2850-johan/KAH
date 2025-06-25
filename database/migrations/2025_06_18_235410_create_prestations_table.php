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
    Schema::create('prestations', function (Blueprint $table) {
        $table->id();
        $table->string('nom'); // Nom de la prestation
        $table->text('description')->nullable(); // Description de la prestation
        $table->decimal('prix', 10, 2); // Prix de la prestation
        $table->integer('duree')->comment('Durée en minutes');// Durée de la prestation en minutes
        $table->enum('statut', ['en_attente', 'validee'])->default('en_attente'); // Statut de la prestation
        $table->timestamps();// Timestamps pour created_at et updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestations');
    }
};
