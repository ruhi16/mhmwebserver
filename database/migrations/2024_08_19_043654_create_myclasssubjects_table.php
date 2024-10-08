<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyclasssubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myclasssubjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('myclass_id');
            $table->integer('subject_id');
            $table->integer('examtype_id');
            $table->integer('is_additional');
            $table->integer('subject_order');
            $table->integer('combination_no')->default('0');
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('myclasssubjects');
    }
}
