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
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->integer('round');
            $table->integer('match_number');
            $table->foreignId('team_id')->constrained();
            $table->integer('points')->nullable();
            $table->integer('given_goals')->nullable();
            $table->integer('goals_conceded')->nullable();
            $table->integer('goal_difference')->nullable();
            $table->boolean('played')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
};
