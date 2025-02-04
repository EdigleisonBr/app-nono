<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OppossingTeam extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'responsible', 'image', 'cell_phone', 'active'];
}
