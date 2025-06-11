<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsStudentDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_student_dbs', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('studentid')->nullable();
            $table->string('pen')->nullable();
            $table->string('uuid_auto')->nullable();
            
            $table->unsignedinteger('admBookNo');
            $table->unsignedinteger('admSlNo');
            $table->date('admDate');

            $table->string('prCls');
            $table->string('prSch');

            $table->string('registration_no')->nullable();
            $table->string('registration_year')->nullable();
            $table->string('registration_type')->nullable();

            $table->string('exam_roll')->nullable();
            $table->string('exam_no')->nullable();

            $table->string('img_ref_1')->nullable();
            $table->string('img_ref_2')->nullable();

            $table->string('name');
            $table->string('adhaar')->nullable();
            $table->string('fname')->nullable();
            $table->string('fadhaar')->nullable();
            $table->string('mname')->nullable();
            $table->string('madhaar')->nullable();
            $table->date('dob')->nullable();
            // 
            // $table->date('doadm')->nullable();            
            $table->string('vill')->nullable();
            $table->string('post')->nullable();
            $table->string('pstn')->nullable();
            $table->string('dist')->nullable();
            $table->string('pin')->nullable();
            $table->string('mobl')->nullable();
            $table->string('mobl2')->nullable();
            
            $table->string('ssex')->nullable();
            $table->string('phch')->nullable();
            $table->string('relg')->nullable();
            $table->string('cste')->nullable();
            $table->string('natn')->nullable();

            $table->string('accNo')->nullable();
            $table->string('ifsc')->nullable();
            $table->string('micr')->nullable();
            $table->string('bnnm')->nullable();
            $table->string('brnm')->nullable();

            $table->integer('st_hs_class_id')->nullable();
            $table->integer('st_hs_section_id')->nullable();
            $table->integer('st_hs_semester_id')->nullable();

            $table->integer('hs_session_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('streason')->nullable();

            $table->integer('enclass_id')->nullable();
            $table->integer('ensection_id')->nullable();
            $table->integer('ensession_id')->nullable();
            $table->string('enreason')->nullable();

            $table->integer('user_id');

            $table->string('crstatus')->nullable();
            $table->string('remarks')->nullable();

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
        Schema::dropIfExists('hs_student_dbs');
    }
}
