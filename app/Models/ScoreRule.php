<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ScoreRule extends Model
{
    use SoftDeletes;
    public function raceType(): BelongsTo
    {
        return $this->belongsTo(RaceType::class);
    }

    public function raceClass(): BelongsTo
    {
        return $this->belongsTo(RaceClass::class);
    }
}
