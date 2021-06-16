<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->float('weight',3,2);//peso
            $table->string('food');//alimento
            $table->float('sodium',3,2);//sodio
            $table->float('dietary_fiber',3,2);//fibra alimentar
            $table->float('trans_fat',3,2);//gordura trans
            $table->float('saturated_fat',3,2);//gordura saturada
            $table->float('total_fat',3,2);//gordura total
            $table->float('protein',3,2);//proteina
            $table->float('carbohydrate',3,2);//carboidrato
            $table->float('energetic value',3,2);//valor energetico
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
        Schema::dropIfExists('food');
    }
}
