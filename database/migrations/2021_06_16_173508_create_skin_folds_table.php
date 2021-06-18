<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkinFoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skin_folds', function (Blueprint $table) {
            $table->id();
            $table->integer('breastplate'); //peitoral
            $table->integer('biceps');
            $table->integer('triceps');
            $table->integer('abdominal');
            $table->integer('subscapular');
            $table->integer('suprailiaco');
            $table->integer('middle_axillary'); //axilar médio
            $table->integer('thigh'); //coxa
            $table->integer('calf'); //panturilha
            $table->integer('Lumbar');
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
        Schema::dropIfExists('skin_folds');
    }
}
