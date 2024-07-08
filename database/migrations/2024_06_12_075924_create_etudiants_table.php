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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filieres_id');
            $table->foreign('filieres_id')->references('id')->on('filieres'); //permet de créer les contraintes d'intégrité
            $table->string('nom', 255);
            $table->string('prenom', 255);
            $table->enum('sexe', ['M', 'F'])->default('M');
            $table->string('matricule')->unique()->nullable();//ce champ sera unique(deux tuples ne peuvent pas avoir une mm info) et peut être vide
            $table->string('adresse')->nullable();
            $table->date('date_naissance');
            $table->string('numero');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
