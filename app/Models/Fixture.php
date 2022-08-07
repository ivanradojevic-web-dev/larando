<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;

    protected $table = 'fixtures_season_2';
    
    //public $timestamps = false;

    protected $guarded = [];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
