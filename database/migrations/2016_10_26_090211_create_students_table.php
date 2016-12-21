<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('index_no', 7)->unique();
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->boolean('gender');
            $table->date('dob');
            $table->integer('batch');
            $table->integer('user_id')->unsigned();

            $table->primary('index_no');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index('index_no', 'first_name','last_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
