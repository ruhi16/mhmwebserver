<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyclassschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myclassschedules', function (Blueprint $table) {
            $table->id();
            $table->integer('myclass_id');
            $table->integer('section_id');
            $table->integer('day_id');
            $table->integer('period_id');
            $table->integer('subject_id');
            $table->integer('teacher_id');

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
        Schema::dropIfExists('myclassschedules');
    }
}