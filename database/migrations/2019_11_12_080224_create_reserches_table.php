<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReserchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('brief');
            $table->string('all_editer');
            $table->string('year');
            $table->string('type');
            $table->string('start_date');
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
        Schema::dropIfExists('reserches');
    }
}
