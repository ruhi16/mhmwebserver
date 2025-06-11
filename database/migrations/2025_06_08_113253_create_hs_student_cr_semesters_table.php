<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsStudentCrSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_student_cr_semesters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hs_student_cr_id')->nullable();
            // $table->foreign('hs_student_cr_id')->references('id')->on('hs_student_crs')->onDelete('cascade');
            $table->unsignedBigInteger('hs_semester_id')->nullable();
            // $table->foreign('hs_semester_id')->references('id')->on('hs_semesters')->onDelete('cascade');

            $table->boolean('status')->nullable();

            $table->boolean('is_examform_filled')->default(0);
            $table->boolean('is_promoted')->default(0);
            $table->boolean('is_active')->default(1);

            $table->unsignedBigInteger('next_hs_student_cr_semester_id')->nullable();

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
        Schema::dropIfExists('hs_student_cr_semesters');
    }
}
