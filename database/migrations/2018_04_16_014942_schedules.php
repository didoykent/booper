<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('schedules', function(Blueprint $table){
        $table->increments('id');
        $table->rememberToken();
        $table->timestamps();
        $table->string('start');
        $table->string('end');
        $table->string('time');
        $table->string('duration');
        $table->integer('tutor_id')->unsigned();
        $table->integer('student_id')->unsigned();

        $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');
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
        Schema::dropIfExists('schedules');
    }
}
