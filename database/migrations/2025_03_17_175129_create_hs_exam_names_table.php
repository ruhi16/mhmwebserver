<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsExamNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_exam_names', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('details')->nullable();
            $table->integer('hs_class_id')->nullable();
            $table->integer('hs_semester_id')->nullable();
            
            
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
        Schema::dropIfExists('hs_exam_names');
    }
}
