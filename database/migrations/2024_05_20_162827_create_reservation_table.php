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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('numReservation');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->date('datePaye');
            $table->float('montant');
            $table->foreignId('numchambre')->constrained('chambres', 'numchambre')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('codeClient')->constrained('clients', 'codeClient')->onDelete('cascade')->onUpdate('cascade');
            // in case the default id has no changes
            /* $table->foreignId('chambre_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('client_id')->constrained()->onDelete('cascade')->onUpdate('cascade'); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
