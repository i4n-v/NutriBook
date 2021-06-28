<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//use Illuminate\Database\DBAL\TimestampType;

class ModifyNutritionistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nutritionists', function (Blueprint $table) {
            $table->dropUnique('nutritionists_crn_unique');
            $table->integer('CRN')->unique(false)->change();
            $table->integer('user_id')->unique();
            $table->dropColumn('name');
            $table->dropColumn('CPF');
            $table->dropColumn('email');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('password');
            $table->dropColumn('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nutritionists', function (Blueprint $table) {
            $table->string('CRN')->unique()->change();
            $table->dropColumn('user_id');
            $table->string('name');
            $table->string('CPF')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
        });
    }
}
