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
            $table->float('breastplate', 9, 2); //peitoral
            $table->float('biceps', 9, 2);
            $table->float('triceps', 9, 2);
            $table->float('abdominal', 9, 2);
            $table->float('subscapular', 9, 2);
            $table->float('suprailiaco', 9, 2);
            $table->float('middle_axillary', 9, 2); //axilar médio
            $table->float('thigh', 9, 2); //coxa
            $table->float('calf', 9, 2); //panturilha
            $table->float('Lombar', 9, 2);
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
