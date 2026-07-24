<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('order')->orderByDesc('created_at')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.form', ['item' => new News()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'meta'   => 'nullable|string|max:255',
            'icon'   => 'nullable|string|max:10',
            'link'   => 'nullable|url|max:255',
            'active' => 'boolean',
            'order'  => 'integer',
        ]);

        $validated['active'] = $request->boolean('active', true);
        $validated['order']  = $request->input('order', 0);

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', '✅ Novedad creada correctamente.');
    }

    public function edit(News $news)
    {
        return view('admin.news.form', ['item' => $news]);
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'meta'   => 'nullable|string|max:255',
            'icon'   => 'nullable|string|max:10',
            'link'   => 'nullable|url|max:255',
            'active' => 'boolean',
            'order'  => 'integer',
        ]);

        $validated['active'] = $request->boolean('active', true);
        $validated['order']  = $request->input('order', 0);

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', '✅ Novedad actualizada correctamente.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')
            ->with('success', '🗑️ Novedad eliminada.');
    }
}
