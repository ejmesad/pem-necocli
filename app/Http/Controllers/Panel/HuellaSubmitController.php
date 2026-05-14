<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\SocialPost;
use App\Models\StrategicLine;
use App\Models\School;
use Illuminate\Http\Request;

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
            'url'                => 'required|url',
            'title'              => 'required|string|max:200',
            'description'        => 'nullable|string|max:500',
            'platform'           => 'required|in:facebook,youtube',
            'strategic_line_id'  => 'required|exists:strategic_lines,id',
            'school_id'          => 'nullable|exists:schools,id',
        ]);

        SocialPost::create([
            'url'               => $validated['url'],
            'title'             => $validated['title'],
            'description'       => $validated['description'] ?? null,
            'platform'          => $validated['platform'],
            'strategic_line_id' => $validated['strategic_line_id'],
            'school_id'         => $validated['school_id'] ?? null,
            'submitted_by'      => auth()->id(),
            'status'            => 'pending',
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
