<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHsSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hs_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('details')->nullable();
            $table->date('stdate');
            $table->date('endate');
            $table->string('status')->nullable();
            $table->string('remark')->nullable();
            $table->integer('prev_hs_session_id')->nullable();
            $table->integer('next_hs_session_id')->nullable();
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
        Schema::dropIfExists('hs_sessions');
    }
}
