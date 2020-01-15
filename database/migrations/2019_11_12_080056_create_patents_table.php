<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('country');
            $table->string('owner');
            $table->string('publish_agency');
            $table->string('year');
            $table->string('type');
            $table->string('number');
            $table->string('publish_schedule');
            $table->string('publish_date');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('file');
            $table->string('file_path');
            $table->string('website');
            $table->string('language');
            $table->string('remark');
            $table->string('person');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patents');
    }
}
