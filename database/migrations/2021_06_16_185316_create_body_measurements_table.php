<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodyMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_measurements', function (Blueprint $table) {
            $table->id();
            $table->integer('bust');//busto
            $table->integer('thorax');//torax
            $table->integer('waist');//cintura
            $table->integer('hip');//quadril
            $table->integer('thigh');//coxa
            $table->integer('calf');//panturrilha
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
        Schema::dropIfExists('body_measurements');
    }
}
