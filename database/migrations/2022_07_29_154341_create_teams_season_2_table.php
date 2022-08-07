<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_season_2', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('matches_played')->default(0);
            $table->integer('points')->default(0);
            $table->integer('wins')->default(0);
            $table->integer('losses')->default(0);
            $table->integer('given_goals')->default(0);
            $table->integer('goals_conceded')->default(0);
            $table->integer('goal_difference')->default(0);
            $table->integer('set_wins')->default(0);
            $table->integer('set_losses')->default(0);
            $table->string('photo_1');
            $table->string('photo_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams_season_2');
    }
};
