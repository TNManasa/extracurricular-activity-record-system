<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id'); //primary key
            $table->integer('student_id');
            $table->tinyInteger('type');
            // 1 = Organization
            // 2 = Sport
            // 3 = Competition
            // 4 = Achievement
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('validation_id')->nullable();
            // null = pending validation action
            // not null = validation action happened
            $table->string('description');

            $table->foreign('student_id')->references('index_no')->on('students');
            $table->foreign('validation_id')->references('id')->on('validations');
        });
    }

   /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
