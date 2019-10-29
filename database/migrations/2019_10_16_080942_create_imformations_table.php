<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imformations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('class');
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->string('title');
            $table->string('second_title');
            $table->string('website');
            $table->string('person');
            $table->string('context');
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
        Schema::dropIfExists('imformations');
    }
}
