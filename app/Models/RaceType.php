<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RaceType extends Model
{
    use SoftDeletes;

    protected $table = 'race_types';
    protected       $fillable = ['type'];
    protected array $dates    = ['created_at', 'updated_at', 'deleted_at'];

    public function races(): HasMany
    {
        return $this->hasMany('App\Models\Race', 'race_type_id');
    }

    public function scoreRules(): HasMany
    {
        return $this->hasMany('App\Models\ScoreRule', 'race_type_id');
    }
}
