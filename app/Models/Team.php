<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams_season_2';

    public $timestamps = false;

    protected $guarded = [];

	public function fixtures()
    {
        return $this->hasMany(Fixture::class);
    }
}
