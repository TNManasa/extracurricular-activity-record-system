<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('competition_activities', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('competition_name');
            $table->string('status');

            $table->primary('id');
            $table->foreign('id')->references('id')->on('activities');
        });
    }

    public function down()
    {
        Schema::dropIfExists('competition_activities');
    }
}
