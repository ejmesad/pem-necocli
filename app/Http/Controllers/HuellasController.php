<?php

namespace App\Http\Controllers;

use App\Models\SocialPost;
use App\Models\StrategicLine;
use Illuminate\Http\Request;

class HuellasController extends Controller
{
    public function index(Request $request)
    {
        $query = SocialPost::with(['strategicLine', 'school'])
            ->approved()
            ->orderBy('featured', 'DESC')
            ->orderBy('approved_at', 'DESC');

        if ($request->has('line') && $request->line) {
            $query->where('strategic_line_id', $request->line);
        }

        if ($request->has('platform') && $request->platform) {
            $query->where('platform', $request->platform);
        }

        $posts    = $query->paginate(12);
        $lines    = StrategicLine::all();
        $featured = SocialPost::approved()->featured()->take(3)->get();
        $stats    = [
            'total'    => SocialPost::approved()->count(),
            'featured' => SocialPost::approved()->featured()->count(),
        ];

        return view('huellas.index', compact('posts', 'lines', 'featured', 'stats'));
    }

    public function show(SocialPost $post)
    {
        if ($post->status !== 'approved' || $post->deleted_at !== null) {
            abort(404);
        }
        return view('huellas.show', compact('post'));
    }
}