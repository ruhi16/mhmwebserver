<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->integer('day_index');
            $table->string('name');
            $table->string('short_name');
            $table->string('day_type'); // holiday, working day, half_working_day
            $table->integer('max_periods')->nullable();
            $table->integer('min_periods')->nullable();

            $table->integer('tiffin_start_after_period_index')->nullable();
            $table->dateTime('start_tiffin_time')->nullable();
            $table->dateTime('end_tiffin_time')->nullable();
            $table->integer('tiffin_duration')->nullable();

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
        Schema::dropIfExists('days');
    }
}
