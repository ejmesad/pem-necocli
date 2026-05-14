<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrategicLine extends Model
{
    protected $fillable = ['slug', 'nombre', 'color_token'];

    public function socialPosts()
    {
        return $this->hasMany(SocialPost::class);
    }
}