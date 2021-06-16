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
            $table->string('Objective'); //Objetivo
            $table->string('pathological_history'); //histórico patológico 
            $table->string('Family history'); //histótico familiar
            $table->string('used_drugs'); //farmacos usados regularmente
            $table->string('life_style'); //estilo de vida
            $table->string('allergies'); //alergias
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
