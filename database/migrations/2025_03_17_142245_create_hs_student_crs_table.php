<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsStudentCrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_student_crs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hs_studentdb_id');
            $table->integer('hs_session_id');
            $table->integer('hs_class_id');
            $table->integer('hs_section_id');
            $table->integer('roll_no');            
            $table->string('result')->nullable();
            $table->string('description')->nullable();
            $table->string('crstatus')->nullable();
            $table->integer('next_class_id')->nullable();
            $table->integer('next_section_id')->nullable();  
            $table->integer('next_semester_id')->nullable();  
            
            $table->integer('next_hs_session_id')->nullable();
            $table->integer('next_hs_studentcr_id')->nullable();            
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
        Schema::dropIfExists('hs_student_crs');
    }
}
