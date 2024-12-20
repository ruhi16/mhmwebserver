<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjectteachers', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('subject_id');
            $table->integer('teacher_id');    
            $table->string('details')->nullable();  
            $table->integer('subject_priority')->nullable();    //1: Main_subj, 2: 2nd_main_subj, 3: Gen_subj, 4: Secondary    
            
            
            $table->string('remark')->nullable();
            $table->string('status')->nullable();
            $table->integer('session_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('prev_session_pk');           
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
        Schema::dropIfExists('subjectteachers');
    }
}
