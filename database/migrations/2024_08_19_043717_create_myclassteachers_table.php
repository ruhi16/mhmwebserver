<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyclassteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myclassteachers', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('myclass_id')->nullable();
            $table->integer('section_id')->nullable();            
            $table->integer('teacher_id')->nullable();
            $table->integer('subject_id')->nullable();            
            $table->string('details')->nullable();


            
            $table->string('remark')->nullable();
            $table->string('status')->nullable();
            $table->integer('session_id')->nullable();
            $table->integer('school_id')->nullable();
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
        Schema::dropIfExists('myclassteachers');
    }
}
