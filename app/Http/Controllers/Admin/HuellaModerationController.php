<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialPost;
use App\Models\StrategicLine;
use Illuminate\Http\Request;

class HuellaModerationController extends Controller
{
    public function index(Request $request)
    {
        $query = SocialPost::with(['submitter', 'strategicLine', 'school'])
            ->pending()
            ->orderBy('created_at', 'ASC');

        if ($request->has('line') && $request->line) {
            $query->where('strategic_line_id', $request->line);
        }

        $posts = $query->paginate(20);
        $lines = StrategicLine::all();
        $stats = [
            'pending'  => SocialPost::pending()->count(),
            'approved' => SocialPost::approved()->count(),
            'rejected' => SocialPost::where('status', 'rejected')->count(),
        ];

        return view('admin.huellas.moderation', compact('posts', 'lines', 'stats'));
    }

    public function approve(SocialPost $post)
    {
        $post->update([
            'status'      => 'approved',
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        return back()->with('success', '✅ Huella aprobada.');
    }

    public function reject(SocialPost $post, Request $request)
    {
        $validated = $request->validate([
            'rejection_reason' => 'required|in:off_topic,low_quality,duplicate,inappropriate',
        ]);

        $post->update([
            'status'           => 'rejected',
            'rejection_reason' => $validated['rejection_reason'],
            'rejected_by'      => auth()->id(),
        ]);

        return back()->with('success', '❌ Huella rechazada.');
    }

    public function feature(SocialPost $post)
    {
        $post->update(['featured' => !$post->featured]);
        return back()->with('success', '⭐ Estado de destacada actualizado.');
    }

    public function published(Request $request)
    {
        $posts = SocialPost::with(['submitter', 'strategicLine'])
            ->approved()
            ->orderBy('featured', 'DESC')
            ->orderBy('approved_at', 'DESC')
            ->paginate(20);

        return view('admin.huellas.published', compact('posts'));
    }
}