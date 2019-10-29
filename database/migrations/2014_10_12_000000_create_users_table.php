<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('password');
          $table->datetime('created_at')->nullable();
          $table->datetime('updated_at')->nullable();
          $table->string('permission');
          $table->string('first_name');
          $table->string('last_name');
          $table->string('email');
          $table->string('staff_number');
          $table->string('fax');
          $table->string('cell_phone');
          $table->string('gender');
          $table->datetime('birthday');
          $table->string('contact_address');
          $table->string('class');
          $table->string('position');  
            //$table->rememberToken();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
