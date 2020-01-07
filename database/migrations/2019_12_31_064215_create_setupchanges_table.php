<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetupchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setupchanges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('encryption');
            $table->string('logouttime');
            $table->string('loginfail');
            $table->string('uploadtype');
            $table->string('uploadsize');
            $table->string('picturetype');
            $table->string('picturesize');
            $table->string('headpastesize');
            $table->string('headpastewidth');
            $table->string('headpasteheight');
            $table->string('photeuploadnumber');
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
        Schema::dropIfExists('setupchanges');
    }
}
