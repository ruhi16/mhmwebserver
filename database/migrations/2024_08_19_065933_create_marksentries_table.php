<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksentriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marksentries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('examdetail_id');
            $table->integer('myclasssection_id');
            $table->integer('myclasssubject_id');
            $table->integer('studentcr_id')->nullable();
            $table->double('marks')->nullable();
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
        Schema::dropIfExists('marksentries');
    }
}
