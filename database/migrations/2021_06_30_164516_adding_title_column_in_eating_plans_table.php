<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\EatingPlan;

class AddingTitleColumnInEatingPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eating_plans', function (Blueprint $table) {
            $table->string('title');

        });
        EatingPlan::where('title', '')
            ->update(['title' => 'Sem título']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eating_plans', function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }
}
