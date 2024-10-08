<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerscriptdistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answerscriptdistributions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->nullable();
            $table->integer('session_id')->nullable();
            $table->integer('examdetail_id')->nullable();
            $table->integer('exam_id')->nullable();
            $table->integer('examtype_id')->nullable();
            $table->integer('exammode_id')->nullable();
            $table->integer('myclass_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->integer('teacher_id')->nullable();
            $table->integer('noscripted_rec')->nullable();
            $table->integer('nostudent_pre')->nullable();
            $table->date('issue_dt')->nullable();
            $table->date('submit_dt')->nullable();
            $table->date('finalize_dt')->nullable();
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('answerscriptdistributions');
    }
}
