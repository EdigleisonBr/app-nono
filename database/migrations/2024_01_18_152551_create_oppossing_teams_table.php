<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOppossingTeamsTable extends Migration
{
    /**
     * Run the migrations.
     * opposing_teams = (id, name, responsible, cell_phone, active)
     * @return void
     */
    public function up()
    {
        Schema::create('oppossing_teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('responsible');
            $table->string('image')->nullable();
            $table->string('cell_phone')->nullable();
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('oppossing_teams');
    }
}
