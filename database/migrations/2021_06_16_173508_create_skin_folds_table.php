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
            $table->integer('breastplate')->nullable(); //peitoral
            $table->integer('biceps')->nullable();
            $table->integer('triceps')->nullable();
            $table->integer('abdominal')->nullable();
            $table->integer('subscapular')->nullable();
            $table->integer('suprailiaco')->nullable();
            $table->integer('middle_axillary')->nullable(); //axilar médio
            $table->integer('thigh')->nullable(); //coxa
            $table->integer('calf')->nullable(); //panturilha
            $table->integer('lumbar')->nullable();
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
