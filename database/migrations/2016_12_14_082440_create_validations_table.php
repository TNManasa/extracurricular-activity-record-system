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
            $table->integer('id')->unsigned();
            $table->integer('rating');
            $table->string('supervisor_id');
            $table->date('validated_date');
            $table->tinyInteger('is_validated');
            // 0 - pending
            // 1 - validated
            // 2 - invalid
            $table->primary('id');
            $table->foreign('supervisor_id')->references('emp_id')->on('supervisors');
            
//            $table->timestamps();
            $table->foreign('id')->references('id')->on('activities');
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
