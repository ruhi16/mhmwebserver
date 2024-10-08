<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionalrulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotionalrules', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('myclass_id');
            $table->integer('examtype_id');
            $table->integer('noofsubjects');
            $table->integer('allowableds');
            $table->string('details')->nullable();
            $table->integer('passmarks')->nullable();
            $table->integer('fullmarks')->nullable();

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
        Schema::dropIfExists('promotionalrules');
    }
}
