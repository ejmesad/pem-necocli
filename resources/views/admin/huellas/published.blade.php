<x-app-layout>
    <x-slot name="header">Huellas Publicadas</x-slot>

    @if(session('success'))
        <div style="background:var(--palma-l);border:1px solid var(--palma);border-radius:var(--radius);padding:14px 18px;margin-bottom:20px;color:#1E5F36;font-weight:700;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
        <h2 style="font-size:18px;font-weight:900;color:var(--navy);">Huellas Publicadas</h2>
        <a href="{{ route('huellas.index') }}" target="_blank"
            style="display:inline-flex;align-items:center;gap:8px;background:var(--navy);color:#fff;padding:10px 18px;border-radius:var(--radius-s);font-size:13px;font-weight:800;text-decoration:none;font-family:'Nunito',sans-serif;">
            <i class="fas fa-eye"></i> Ver página pública
        </a>
    </div>

    @if($posts->count() > 0)
        <div style="display:grid;gap:12px;">
            @foreach($posts as $post)
                <div style="background:var(--white);border-radius:var(--radius);border:1px solid var(--border);box-shadow:var(--shadow);padding:16px 20px;display:flex;align-items:center;gap:16px;">
                    <div style="width:44px;height:44px;border-radius:10px;background:{{ $post->platform === 'youtube' ? '#fef0ee' : 'var(--lila-l)' }};display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">
                        {{ $post->platform === 'youtube' ? '▶️' : '📘' }}
                    </div>
                    <div style="flex:1;min-width:0;">
                        <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px;">
                            @if($post->featured)
                                <span style="background:var(--sol-l);color:var(--sol-d);padding:2px 8px;border-radius:20px;font-size:10px;font-weight:800;font-family:'Nunito',sans-serif;">⭐ Destacada</span>
                            @endif
                            <span style="font-size:14px;font-weight:800;color:var(--texto);font-family:'Nunito',sans-serif;">{{ $post->title }}</span>
                        </div>
                        <div style="font-size:11px;color:var(--gris-l);">
                            {{ $post->strategicLine->nombre ?? 'Sin línea' }} •
                            {{ $post->submitter->name ?? 'N/A' }} •
                            {{ $post->approved_at?->diffForHumans() }}
                        </div>
                    </div>
                    <div style="display:flex;gap:8px;">
                        <!-- Destacar/Quitar destacado -->
                        <form method="POST" action="{{ route('admin.huellas.feature', $post) }}">
                            @csrf @method('PATCH')
                            <button type="submit"
                                style="padding:8px 14px;background:{{ $post->featured ? 'var(--sol)' : 'var(--bg)' }};color:{{ $post->featured ? 'var(--navy)' : 'var(--gris)' }};border:1px solid var(--border);border-radius:var(--radius-s);font-size:12px;font-weight:800;cursor:pointer;font-family:'Nunito',sans-serif;">
                                ⭐ {{ $post->featured ? 'Quitar' : 'Destacar' }}
                            </button>
                        </form>
                        <a href="{{ $post->url }}" target="_blank"
                            style="padding:8px 14px;background:var(--bg);color:var(--caribe);border:1px solid var(--border);border-radius:var(--radius-s);font-size:12px;font-weight:800;text-decoration:none;font-family:'Nunito',sans-serif;">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="margin-top:20px;">{{ $posts->links() }}</div>
    @else
        <div style="background:var(--white);border-radius:16px;border:1px solid var(--border);padding:48px;text-align:center;">
            <div style="font-size:48px;margin-bottom:16px;">📭</div>
            <h3 style="font-size:16px;font-weight:800;color:var(--navy);margin-bottom:8px;">Sin huellas publicadas</h3>
            <p style="font-size:13px;color:var(--gris);">Aprueba huellas desde la cola de moderación.</p>
            <a href="{{ route('admin.huellas.moderation') }}"
                style="display:inline-flex;align-items:center;gap:8px;background:var(--caribe);color:#fff;padding:10px 20px;border-radius:var(--radius-s);font-size:13px;font-weight:800;text-decoration:none;margin-top:16px;font-family:'Nunito',sans-serif;">
                <i class="fas fa-clock"></i> Ir a moderación
            </a>
        </div>
    @endif

</x-app-layout>