<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table){

              $table->increments('id');
              $table->rememberToken();
              $table->timestamps();
              $table->text('message');
              $table->string('avatar');
              $table->string('name');
              $table->string('header')->default('Today')->nullable();
              $table->boolean('inset')->default(1)->nullable();
              $table->boolean('divider')->default(1)->nullable();
              $table->boolean('read')->default(0)->nullable();
              $table->boolean('from_student')->default(0)->nullable();
              $table->boolean('from_tutor')->default(0)->nullable();
              $table->integer('student_id')->unsigned()->nullable();
              $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
              $table->integer('tutors_id')->unsigned()->nullable();
              $table->foreign('tutors_id')->references('id')->on('tutors')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
