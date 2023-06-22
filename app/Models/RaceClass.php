<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RaceClass extends Model
{
    use SoftDeletes;

    protected $table = 'race_classes';
    protected $fillable = ['type'];
}
