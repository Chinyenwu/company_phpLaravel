<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('speech_name');
            $table->string('meeting_name');
            $table->string('position');
            $table->string('agency');
            $table->string('all_editer');
            $table->string('year');
            $table->string('type');
            $table->string('level');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('publish_year');
            $table->string('editer_number');
            $table->string('editer_type');
            $table->string('ISSN');
            $table->string('ISI_Number');
            $table->string('file');
            $table->string('file_path');
            $table->string('website');
            $table->string('language');
            $table->string('project_name');
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
        Schema::dropIfExists('seminars');
    }
}
