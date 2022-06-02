<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
    	'date' => 'date',
	];

	public function fixtures()
    {
        return $this->hasMany(Fixture::class);
    }
}
