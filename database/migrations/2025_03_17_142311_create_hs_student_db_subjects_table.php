<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsStudentDbSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_student_db_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('hs_studentdb_id')->nullable();
            $table->integer('hs_subject_id')->nullable();
            $table->string('details')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            $table->integer('hs_session_id')->nullable();
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
        Schema::dropIfExists('hs_student_db_subjects');
    }
}
