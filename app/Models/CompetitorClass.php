<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompetitorClass extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'race_class_id',
        'number',
    ];
}
