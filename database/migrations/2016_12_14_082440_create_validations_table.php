<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validations', function (Blueprint $table) {
            $table->integer('validation_id')->unsigned();
            $table->integer('rating');
            $table->string('validation_description');
            $table->string('supervisor_id');
            $table->date('validated_date');
            $table->tinyInteger('is_validated');
            // 0 - pending
            // 1 - validated
            // 2 - invalid
            $table->primary('validation_id');
            $table->foreign('supervisor_id')->references('emp_id')->on('supervisors');
            
//            $table->timestamps();
            $table->foreign('validation_id')->references('id')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validations');
    }
}
