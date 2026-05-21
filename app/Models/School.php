<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class School extends Model
{
    protected $fillable = [
        'name', 'slug', 'type', 'municipality', 'address',
        'founded_year', 'email', 'phone', 'description',
        'logo_url', 'cover_url', 'website_url',
        'students_count', 'teachers_count',
        'location_lat', 'location_lng',
        'social_links', 'rector_id', 'active',
    ];

    protected $casts = [
        'active'         => 'boolean',
        'social_links'   => 'array',
        'students_count' => 'integer',
        'teachers_count' => 'integer',
        'founded_year'   => 'integer',
        'location_lat'   => 'float',
        'location_lng'   => 'float',
    ];

    public function rector(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rector_id');
    }

    public function sedes(): HasMany
{
    return $this->hasMany(Sede::class);
}

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class)
                    ->withPivot('active')
                    ->withTimestamps();
    }

    public function getLogoUrlAttribute($value): string
    {
        return $value ?? 'images/colegios/placeholder-logo.png';
    }

    public function getCoverUrlAttribute($value): ?string
    {
        return $value;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
