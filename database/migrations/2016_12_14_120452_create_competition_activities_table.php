<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('competition_activities', function (Blueprint $table) {
            $table->integer('c_id')->unsigned();
            $table->string('competition_name');
            $table->string('status');

            $table->primary('c_id');
            $table->foreign('c_id')->references('id')->on('activities');
        });
    }

    public function down()
    {
        Schema::dropIfExists('competition_activities');
    }
}
