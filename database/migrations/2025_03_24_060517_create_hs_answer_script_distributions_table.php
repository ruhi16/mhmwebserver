<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsAnswerScriptDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_answer_script_distributions', function (Blueprint $table) {
            $table->id();
            $table->integer('hs_exam_detail_id')->nullable();
            $table->integer('hs_subject_id')->nullable();
            $table->integer('hs_teacher_id')->nullable();
            
            $table->boolean('hs_is_range')->default(0)->nullable();
            $table->integer('hs_range_reg_from')->nullable();
            $table->integer('hs_range_reg_to')->nullable();
            $table->integer('hs_range_roll_from')->nullable();
            $table->integer('hs_range_roll_to')->nullable();
            $table->integer('hs_range_total')->nullable();

            $table->date('issue_date')->nullable();
            $table->date('submit_date')->nullable();
            

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
        Schema::dropIfExists('hs_answer_script_distributions');
    }
}
