<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalkeeperGoalsTable extends Migration
{
    /**
     * Run the migrations.
     * goalkeeper_goals = (id, goals, athete_id)
     * @return void
     */
    public function up()
    {
        Schema::create('goalkeeper_goals', function (Blueprint $table) {
            $table->id();
            $table->integer('goals');
            $table->foreignId('match_id')->constrained('matches');
            $table->foreignId('athlete_id')->constrained('athletes');
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
        Schema::dropIfExists('goalkeeper_goals');
    }
}
