<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'instagram', 'cell_phone', 'date_birth', 'goalkeeper', 'active'];
}