<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tutors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutors', function(Blueprint $table){

          $table->increments('id');
          $table->string('en_name');
          $table->string('kr_name');
          $table->string('email')->unique();
          $table->string('password');
          $table->string('chatroute', 30)->unique()->nullable();
          $table->integer('tutor_id')->unsigned();
          $table->string('role')->nullable();
          $table->string('previous_conn_id')->nullable();
          $table->string('current_conn_id')->nullable();

          $table->rememberToken();
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
        Schema::dropIfExists('tutors');
    }
}
