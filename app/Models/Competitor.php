<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Competitor extends Model
{
    use SoftDeletes;
    protected       $fillable = ['name'];
    protected array $dates    = ['deleted_at', 'created_at', 'updated_at'];
    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }

    public function races(): HasManyThrough
    {
        return $this->hasManyThrough(
            'App\Models\Race',
            'App\Models\Position',
            'competitor_id', // Foreign key on Position table
            'id', // Foreign key on Race table
            'id', // Local key on Competitor table
            'race_id' // Local key on Position table
        );
    }

    public function raceTypes(): HasManyThrough
    {
        return $this->hasManyThrough(
            'App\Models\RaceType',
            'App\Models\Race',
            'id', // Foreign key on Race table
            'id', // Foreign key on RaceType table
            'id', // Local key on Competitor table
            'race_type_id' // Local key on Race table
        )->via('races');
    }

    public function scoreRules(): HasManyThrough
    {
        return $this->hasManyThrough(
            'App\Models\ScoreRule',
            'App\Models\Race',
            'id', // Foreign key on Race table
            'race_type_id', // Foreign key on ScoreRule table
            'id', // Local key on Competitor table
            'race_type_id' // Local key on Race table
        )->via('races');
    }
    public function competitorClasses(): BelongsToMany
    {
        return $this->belongsToMany(
            'App\Models\CompetitorClass',
            'competitor_classes', // Pivot table name
            'competitor_id', // Foreign key on pivot table
            'race_class_id' // Related key on pivot table
        );
    }
}
