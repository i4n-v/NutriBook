<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemovingEatingPlanMealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('eating_plan_meals');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('eating_plan_meals', function (Blueprint $table) {
            $table->id();
            $table->integer('eating_plan_id');
            $table->integer('meal_id');
            $table->timestamps();
        });
    }
}
