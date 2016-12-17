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
            $table->integer('id')->unsigned();
            $table->integer('org_id')->unsigned();
            $table->string('project_name')->nullable();
            $table->string('role');

            $table->primary('id');
            $table->foreign('id')->references('id')->on('activities');
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
