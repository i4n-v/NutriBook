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
            $table->Integer('weight');//peso
            $table->string('food');//alimento
            $table->Integer('sodium');//sodio
            $table->Integer('dietary_fiber');//fibra alimentar
            $table->Integer('trans_fat');//gordura trans
            $table->Integer('saturated_fat');//gordura saturada
            $table->Integer('total_fat');//gordura total
            $table->Integer('protein');//proteina
            $table->Integer('carbohydrate');//carboidrato
            $table->Integer('energetic_value');//valor energetico
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
