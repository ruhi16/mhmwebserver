<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentvlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentvls', function (Blueprint $table) {
            $table->id();
            $table->string('gurdian_name_en')->nullable();
            $table->string('gurdian_name_bn')->nullable();
            $table->string('relation')->nullable();            
            $table->string('village')->nullable();
            $table->string('po')->nullable();
            $table->string('ps')->nullable();
            $table->string('pin')->nullable();              
            
            $table->string('student_name_en')->nullable();
            $table->string('student_name_bn')->nullable();
            $table->integer('myclass_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('roll_no')->nullable();
            $table->integer('brother_id')->nullable();

            $table->string('status')->nullable();
            $table->string('remark')->nullable();

            $table->string('adm_sl_no')->nullable();
            $table->date('adm_date')->nullable();
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
        Schema::dropIfExists('studentvls');
    }
}
