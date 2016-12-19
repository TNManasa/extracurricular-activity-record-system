<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_activities', function (Blueprint $table) {
            $table->integer('s_id')->unsigned();
            $table->integer('sport_id')->unsigned();
            $table->string('role');

            $table->primary('s_id');
            $table->foreign('s_id')->references('id')->on('activities');
            $table->foreign('sport_id')->references('id')->on('sports');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sport_activities');
    }
}
