<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Fixture;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderByDesc('points')
        	->orderByDesc('goal_difference')
        	->get();

        return TeamResource::collection($teams);
    }

    public function history()
    {
        $teams = DB::table('teams')->orderByDesc('points')
        	->orderByDesc('goal_difference')
        	->get();

        return TeamResource::collection($teams);
    }

    public function show($slug)
    {
        $team = Team::with('fixtures')
        	->where('slug', $slug)
        	->first();

        $teamFixtures = $team->fixtures->map(function ($item) {
            return Fixture::with('team')
                ->where('round', $item->round)
                ->where('match_number', $item->match_number)
                ->get();
        });

        return response()->json([
            'team' => $team,
            'fixtures' => $teamFixtures,
        ]);
    }
}
