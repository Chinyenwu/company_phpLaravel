<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworklinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('networklinks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('networklink_class');
            $table->string('title');
            $table->string('content');
            $table->string('link');
            $table->string('way');
            $table->string('editer');
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
        Schema::dropIfExists('networklinks');
    }
}
