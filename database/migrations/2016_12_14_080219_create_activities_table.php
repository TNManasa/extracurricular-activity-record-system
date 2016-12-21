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
            $table->string('student_id', 7);
            $table->tinyInteger('activity_type');
            // 1 = Organization
            // 2 = Sport
            // 3 = Competition
            // 4 = Achievement
            $table->date('start_date')->nullable();
            $table->string('end_date', 10)->nullable();
            $table->integer('effort');  // measured in hours
            $table->text('description')->nullable();
            $table->tinyInteger('image');

            $table->foreign('student_id')->references('index_no')->on('students');
        });
    }

    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
