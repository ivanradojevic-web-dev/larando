<?php

namespace App\Http\Resources;

use App\Http\Resources\TeamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FixtureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'round' => $this->round,
            'match_number' => $this->match_number,
            'team' => new TeamResource($this->team),
            'points' => $this->points,
            'given_goals' => $this->given_goals,
            'goals_conceded' => $this->goals_conceded,
            'goal_difference' => $this->goal_difference,
            'played' => $this->played,
        ];
    }
}
