<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderByDesc('points')
        	->orderByDesc('goal_difference')
        	->get();

        return TeamResource::collection($teams);
    }

    public function show($slug)
    {
        $team = Team::with('fixtures')
        	->where('slug', $slug)
        	->first();

        return new TeamResource($team);
    }
}
