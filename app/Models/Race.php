<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Race extends Model
{
    use SoftDeletes;

    protected $fillable = ['date', 'race_type_id', 'race_class_id'];
    protected array $dates    = ['date', 'created_at', 'updated_at', 'deleted_at'];
    public function raceType(): BelongsTo
    {
        return $this->belongsTo(RaceType::class);
    }

    public function raceClass(): BelongsTo
    {
        return $this->belongsTo(RaceClass::class);
    }

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }
}
