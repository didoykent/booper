<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Recordings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordings', function(Blueprint $table){
          $table->increments('id');
          $table->rememberToken();
          $table->timestamps();
          $table->string('title');
          $table->string('bookPage');
          $table->string('tutor');
          $table->string('student');
          $table->string('fileName');
          $table->text('description');
          $table->string('link');
          $table->string('size');
          $table->string('length');
          $table->integer('student_id')->unsigned();

          $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('recordings');
    }
}
