<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name', 'slug', 'municipality',
        'email', 'phone', 'description',
        'logo_url', 'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function socialPosts()
    {
        return $this->hasMany(SocialPost::class);
    }
}