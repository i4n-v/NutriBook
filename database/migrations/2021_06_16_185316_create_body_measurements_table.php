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
            $table->float('bust', 3, 2);//busto
            $table->float('thorax', 3, 2);//torax
            $table->float('waist', 3, 2);//cintura
            $table->float('hip', 3, 2);//quadril
            $table->float('thigh', 3, 2);//coxa
            $table->float('calf', 3, 2);//panturrilha
            $table->integer('evaluations_id');
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
