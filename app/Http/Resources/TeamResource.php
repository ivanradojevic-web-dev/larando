<?php

namespace App\Http\Resources;

use App\Http\Resources\FixtureResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'matches_played' => $this->matches_played,
            'points' => $this->points,
            'wins' => $this->wins,
            'losses' => $this->losses,
            'given_goals' => $this->given_goals,
            'goals_conceded' => $this->goals_conceded,
            'goal_difference' => $this->goal_difference,
            'photo_1' => $this->photo_1,
            'photo_2' => $this->photo_2,
            'matches' => FixtureResource::collection($this->whenLoaded('fixtures')),
        ];

            
    }
}
