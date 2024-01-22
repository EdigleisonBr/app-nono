<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
    use HasFactory;

    protected $fillable = ['local', 'match_date', 'hour', 'own_goals', 'goals_in_favor', 'oppossing_team_id'];

    public function team()
    {
        return $this->hasOne(OppossingTeam::class, 'id', 'oppossing_team_id');
    }
}
