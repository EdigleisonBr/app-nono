<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalkeeperGoal extends Model
{
    use HasFactory;

    public function athlete()
    {
        return $this->belongsTo(Athlete::class);
    }
}
