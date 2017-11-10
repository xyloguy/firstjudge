<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournament extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->dateTime('tournament_date');
            $table->text('scoresheet');
            $table->dateTime('timer_end');
            $table->integer('timer_duration');
            $table->integer('timer_pre_duration');
            $table->integer('timer_post_duration');
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
        //
        Schema::dropIfExists('tournaments');
    }
}
