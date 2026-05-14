<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialPost extends Model
{
    use SoftDeletes;

    protected $fillable = [
    'url', 'title', 'description', 'platform',
    'strategic_line_id', 'school_id', 'submitted_by',
    'approved_by', 'rejected_by', 'status',
    'approval_reason', 'rejection_reason',
    'featured', 'thumbnail_url', 'thumbnail_path',
    'embed_html', 'oembed_data', 'fetched_at', 'approved_at',
];

    protected $casts = [
        'featured'    => 'boolean',
        'oembed_data' => 'array',
        'approved_at' => 'datetime',
        'fetched_at'  => 'datetime',
    ];

    public function submitter()
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }

    public function strategicLine()
    {
        return $this->belongsTo(StrategicLine::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved')->whereNull('deleted_at');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
