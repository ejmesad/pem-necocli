<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sede extends Model
{
    protected $fillable = [
        'school_id', 'name', 'codigo_dane',
        'address', 'is_main', 'cover_url',
        'location_lat', 'location_lng',
    ];

    protected $casts = [
        'is_main'      => 'boolean',
        'location_lat' => 'float',
        'location_lng' => 'float',
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
