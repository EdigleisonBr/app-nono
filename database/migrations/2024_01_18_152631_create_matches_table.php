<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     * matches = (id, match_date, hour, own_goals, goals_in_favor, local, opposing_team_id)
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('local');
            $table->date('match_date');
            $table->string('hour');
            $table->integer('own_goals');
            $table->integer('goals_in_favor');
            $table->foreignId('oppossing_team_id')->constrained('oppossing_teams');
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
        Schema::dropIfExists('matches');
    }
}
