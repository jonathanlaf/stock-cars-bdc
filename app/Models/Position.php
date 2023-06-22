<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;
    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    public function competitor(): BelongsTo
    {
        return $this->belongsTo(Competitor::class);
    }

    public function getScoreAttribute() {
        # Get score from score_rules for the race type
        dd(ScoreRule::where('race_type_id', $this->race->race_type_id)->where('position', $this->position)->get());
        return ScoreRule::where('race_type', $this->race->race_type)->where('position', $this->position)->get();
    }
}
