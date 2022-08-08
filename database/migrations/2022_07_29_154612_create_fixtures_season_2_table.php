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
        Schema::create('fixtures_season_2', function (Blueprint $table) {
            $table->id();
            $table->integer('round');
            $table->integer('match_number');
            $table->foreignId('team_id')->constrained('teams_season_2');
            $table->integer('points')->nullable();
            $table->integer('given_goals')->nullable();
            $table->integer('goals_conceded')->nullable();
            $table->integer('goal_difference')->nullable();
            $table->boolean('played')->default(false);
            $table->integer('set_wins')->nullable();
            $table->integer('set_losses')->nullable();
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
        Schema::dropIfExists('fixtures_season_2');
    }
};
