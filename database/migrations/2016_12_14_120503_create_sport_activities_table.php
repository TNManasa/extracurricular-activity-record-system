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
            $table->integer('id')->unsigned();
            $table->integer('sport_id')->unsigned();
            $table->string('role');

            $table->primary('id');
            $table->foreign('id')->references('id')->on('activities');
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
