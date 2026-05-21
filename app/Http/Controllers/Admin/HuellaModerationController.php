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

    public function approve(SocialPost $post, Request $request)
    {
        // BUG-006 (OI-017): validar que la huella tenga línea estratégica antes de aprobar.
        // Si el remitente no la eligió (OI-020), el admin puede asignarla aquí.
        $validated = $request->validate([
            'strategic_line_id' => 'nullable|exists:strategic_lines,id',
        ]);

        // Usar la línea enviada por el form (si el admin la seleccionó),
        // o la que ya traía la huella. Si ninguna está presente, bloquear.
        $lineId = $validated['strategic_line_id'] ?? $post->strategic_line_id;

        if (empty($lineId)) {
            return back()
                ->withInput()
                ->with('error', 'Debes asignar una línea estratégica antes de aprobar esta huella.');
        }

        $post->update([
            'status'             => 'approved',
            'strategic_line_id'  => $lineId,
            'approved_by'        => auth()->id(),
            'approved_at'        => now(),
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
        $post->update(['featured' => ! $post->featured]);

        $msg = $post->featured ? '⭐ Huella destacada.' : '⭐ Huella quitada de destacadas.';
        return back()->with('success', $msg);
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
