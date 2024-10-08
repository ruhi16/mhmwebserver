<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id');
            $table->integer('examtype_id');
            $table->integer('exammode_id');
            $table->integer('myclass_id');
            $table->integer('subject_id');
            $table->integer('full_mark');
            $table->integer('pass_mark');
            $table->integer('time_alloted');
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('examdetails');
    }
}
