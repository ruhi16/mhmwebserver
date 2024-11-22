<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklymyclasssubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weeklymyclasssubjects', function (Blueprint $table) {
            $table->id();
            $table->integer('myclass_id');
            $table->integer('section_id')->nullable();
            $table->integer('subject_id');
            $table->integer('weekly_no_of_classes_allowed')->nullable();
            $table->integer('weekly_no_of_classes_assigned')->nullable();

            $table->string('details')->nullable();

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
        Schema::dropIfExists('weeklymyclasssubjects');
    }
}
