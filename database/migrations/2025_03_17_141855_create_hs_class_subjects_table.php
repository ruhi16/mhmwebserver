<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsClassSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_class_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('hs_exam_name_id')->nullable();
            $table->integer('hs_exam_mode_id')->nullable();
            $table->integer('hs_class_id')->nullable();
            $table->integer('hs_semester_id')->nullable();
            $table->integer('hs_subject_id')->nullable();
            $table->integer('hs_subject_type_id')->nullable();

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
        Schema::dropIfExists('hs_class_subjects');
    }
}
