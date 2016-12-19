<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_activities', function (Blueprint $table) {
            $table->integer('o_id')->unsigned();
            $table->integer('org_id')->unsigned();
            $table->string('project_name')->nullable();
            $table->string('role');

            $table->primary('o_id');
            $table->foreign('o_id')->references('id')->on('activities');
            $table->foreign('org_id')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org_activities');
    }
}
