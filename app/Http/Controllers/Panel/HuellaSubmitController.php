<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\SocialPost;
use App\Models\StrategicLine;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HuellaSubmitController extends Controller
{
    public function create()
    {
        $lines   = StrategicLine::all();
        $schools = School::where('active', true)->get();
        return view('panel.huellas.create', compact('lines', 'schools'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'url'               => 'required|url',
            'title'             => 'required|string|max:200',
            'description'       => 'nullable|string|max:500',
            'platform'          => 'required|in:facebook,youtube',
            'strategic_line_id' => 'required|exists:strategic_lines,id',
            'school_id'         => 'nullable|exists:schools,id',
            'thumbnail'         => 'nullable|image|max:2048',
        ]);

        $thumbnailPath = null;
        $thumbnailUrl  = null;

        // Si subió imagen manual
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('huellas', 'public');
            $thumbnailUrl  = Storage::url($thumbnailPath);
        }

        // Auto-thumbnail para YouTube
        if (!$thumbnailUrl && $validated['platform'] === 'youtube') {
            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $validated['url'], $matches);
            if (!empty($matches[1])) {
                $thumbnailUrl = 'https://img.youtube.com/vi/' . $matches[1] . '/maxresdefault.jpg';
            }
        }

        SocialPost::create([
            'url'               => $validated['url'],
            'title'             => $validated['title'],
            'description'       => $validated['description'] ?? null,
            'platform'          => $validated['platform'],
            'strategic_line_id' => $validated['strategic_line_id'],
            'school_id'         => $validated['school_id'] ?? null,
            'submitted_by'      => auth()->id(),
            'status'            => 'pending',
            'thumbnail_url'     => $thumbnailUrl,
            'thumbnail_path'    => $thumbnailPath,
        ]);

        return redirect()->route('panel.huellas.index')
            ->with('success', '✅ Huella enviada. Está en revisión.');
    }

    public function index()
    {
        $posts = SocialPost::with('strategicLine')
            ->where('submitted_by', auth()->id())
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('panel.huellas.index', compact('posts'));
    }
}