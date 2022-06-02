<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $guarded = [];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
