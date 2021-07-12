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
            $table->integer('bust')->nullable();//busto
            $table->integer('thorax')->nullable();//torax
            $table->integer('waist')->nullable();//cintura
            $table->integer('hip')->nullable();//quadril
            $table->integer('thigh')->nullable();//coxa
            $table->integer('calf')->nullable();//panturrilha
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
