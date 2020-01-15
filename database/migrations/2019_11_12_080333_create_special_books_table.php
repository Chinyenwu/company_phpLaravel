<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('chapter');
            $table->string('main_editer');
            $table->string('publish_club');
            $table->string('publish_position');
            $table->string('all_editer');
            $table->string('year');
            $table->string('date');
            $table->string('page');
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
        Schema::dropIfExists('special_books');
    }
}
