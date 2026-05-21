<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $fillable = [
        'strategic_line_id', 'name', 'slug', 'program',
        'purpose', 'key_components',
        'progress', 'goals_count', 'goals_done_count', 'active',
    ];

    protected $casts = [
        'active'          => 'boolean',
        'progress'        => 'float',
        'goals_count'     => 'integer',
        'goals_done_count'=> 'integer',
    ];

    public function strategicLine(): BelongsTo
    {
        return $this->belongsTo(StrategicLine::class);
    }

    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class)
                    ->withPivot('active')
                    ->withTimestamps();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
