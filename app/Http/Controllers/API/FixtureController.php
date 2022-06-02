<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FixtureResource;
use App\Models\Fixture;
use Illuminate\Http\Request;

class FixtureController extends Controller
{
    public function index(Request $request)
    {
    	$fixtures = match ($request->query('filter')) {
		    'fixtures' => Fixture::with('team')->where('played', false)->get(),
		    'results' => Fixture::with('team')->where('played', true)->get(),
			default => Fixture::with('team')->get(),
		};

        return FixtureResource::collection($fixtures)
        	->groupBy('round');
    }

    public function edit(Request $request)
    {   
        $validated = $request->validate([
            'params.id_1' => 'required|integer',
            'params.id_2' => 'required|integer',
            'params.team_1_goals' => 'required|integer',
            'params.team_2_goals' => 'required|integer',
        ]);

        if ($validated['params']['team_1_goals'] === $validated['params']['team_2_goals']) {
            return response()->json([
                'success' => false,
            ]);
        }
        /*
        |--------------------------------------------------------------------------
        | Update Fixture table
        |--------------------------------------------------------------------------
        */
        $fixture1 = Fixture::find($validated['params']['id_1']);

        if ($fixture1->played) {
            $teamOne = $fixture1->team;

            $teamOne->decrement('matches_played', 1);
            if ($fixture1->points === 3) {
                $teamOne->decrement('wins', 1);
            } else {
                $teamOne->decrement('losses', 1);
            }
            $teamOne->decrement('points', $fixture1->points);
            $teamOne->decrement('given_goals', $fixture1->given_goals);
            $teamOne->decrement('goals_conceded', $fixture1->goals_conceded);
            $teamOne->decrement('goal_difference', $fixture1->goal_difference);

            $fixture1->points = 0;
            $fixture1->given_goals = 0;
            $fixture1->goals_conceded = 0;
            $fixture1->goal_difference = 0;
            $fixture1->played = false;

            $fixture1->save();
        }

        $fixture1->points = $validated['params']['team_1_goals'] > $validated['params']['team_2_goals'] ? 3 : 0;
        $fixture1->given_goals = $validated['params']['team_1_goals'];
        $fixture1->goals_conceded = $validated['params']['team_2_goals'];
        $fixture1->goal_difference = $fixture1->given_goals - $fixture1->goals_conceded;
        $fixture1->played = true;

        $fixture1->save();

        $fixture2 = Fixture::find($validated['params']['id_2']);

        if ($fixture2->played) {
            $teamTwo = $fixture2->team;

            $teamTwo->decrement('matches_played', 1);
            if ($fixture2->points === 3) {
                $teamTwo->decrement('wins', 1);
            } else {
                $teamTwo->decrement('losses', 1);
            }
            $teamTwo->decrement('points', $fixture2->points);
            $teamTwo->decrement('given_goals', $fixture2->given_goals);
            $teamTwo->decrement('goals_conceded', $fixture2->goals_conceded);
            $teamTwo->decrement('goal_difference', $fixture2->goal_difference);

            $fixture2->points = 0;
            $fixture2->given_goals = 0;
            $fixture2->goals_conceded = 0;
            $fixture2->goal_difference = 0;
            $fixture2->played = false;

            $fixture2->save();
        }

        $fixture2->points = $validated['params']['team_1_goals'] < $validated['params']['team_2_goals'] ? 3 : 0;
        $fixture2->given_goals = $validated['params']['team_2_goals'];
        $fixture2->goals_conceded = $validated['params']['team_1_goals'];
        $fixture2->goal_difference = $fixture2->given_goals - $fixture2->goals_conceded;
        $fixture2->played = true;

        $fixture2->save();

        /*
        |--------------------------------------------------------------------------
        | Update Team table
        |--------------------------------------------------------------------------
        */
        $teamOne = $fixture1->team;

        $teamOne->increment('matches_played', 1);
        $teamOne->increment('points', $fixture1->points);
        if ($fixture1->points === 3) {
            $teamOne->increment('wins', 1);
        } else {
            $teamOne->increment('losses', 1);
        }
        $teamOne->increment('given_goals', $fixture1->given_goals);
        $teamOne->increment('goals_conceded', $fixture1->goals_conceded);
        $teamOne->increment('goal_difference', $fixture1->goal_difference);

        $teamTwo = $fixture2->team;

        $teamTwo->increment('matches_played', 1);
        $teamTwo->increment('points', $fixture2->points);
        if ($fixture2->points === 3) {
            $teamTwo->increment('wins', 1);
        } else {
            $teamTwo->increment('losses', 1);
        }
        $teamTwo->increment('given_goals', $fixture2->given_goals);
        $teamTwo->increment('goals_conceded', $fixture2->goals_conceded);
        $teamTwo->increment('goal_difference', $fixture2->goal_difference);

        return response()->json([
            'success' => true,
        ]);
    }
}
