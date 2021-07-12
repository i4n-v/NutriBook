<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnamnesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamneses', function (Blueprint $table) {
            $table->id();
            $table->string('objective')->nullable(); //Objetivo
            $table->string('pathological_history')->nullable(); //histórico patológico 
            $table->string('family_history')->nullable(); //histótico familiar
            $table->string('used_drugs')->nullable(); //farmacos usados regularmente
            $table->string('life_style')->nullable(); //estilo de vida
            $table->string('allergies')->nullable(); //alergias
            $table->integer('evaluation_id');
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
        Schema::dropIfExists('anamneses');
    }
}
