<x-app-layout>
    <x-slot name="header">Mis Envíos</x-slot>

    @if(session('success'))
        <div style="background:var(--palma-l);border:1px solid var(--palma);border-radius:var(--radius);padding:14px 18px;margin-bottom:20px;color:#1E5F36;font-weight:700;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
        <h2 style="font-size:18px;font-weight:900;color:var(--navy);">Mis Huellas</h2>
        <a href="{{ route('panel.huellas.create') }}"
            style="display:inline-flex;align-items:center;gap:8px;background:var(--caribe);color:#fff;padding:10px 18px;border-radius:var(--radius-s);font-size:13px;font-weight:800;text-decoration:none;font-family:'Nunito',sans-serif;">
            <i class="fas fa-plus"></i> Nueva Huella
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
                        <div style="font-size:14px;font-weight:800;color:var(--texto);margin-bottom:4px;font-family:'Nunito',sans-serif;">{{ $post->title }}</div>
                        <div style="font-size:11px;color:var(--gris-l);">
                            {{ $post->strategicLine->nombre ?? 'Sin línea' }} •
                            {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div>
                        @if($post->status === 'pending')
                            <span style="background:var(--sol-l);color:var(--sol-d);padding:4px 12px;border-radius:20px;font-size:11px;font-weight:800;font-family:'Nunito',sans-serif;">⏳ En revisión</span>
                        @elseif($post->status === 'approved')
                            <span style="background:var(--palma-l);color:#1E5F36;padding:4px 12px;border-radius:20px;font-size:11px;font-weight:800;font-family:'Nunito',sans-serif;">✅ Aprobada</span>
                        @else
                            <span style="background:var(--coral-l);color:var(--coral);padding:4px 12px;border-radius:20px;font-size:11px;font-weight:800;font-family:'Nunito',sans-serif;">❌ Rechazada</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div style="margin-top:20px;">{{ $posts->links() }}</div>
    @else
        <div style="background:var(--white);border-radius:16px;border:1px solid var(--border);padding:48px;text-align:center;">
            <div style="font-size:48px;margin-bottom:16px;">🌊</div>
            <h3 style="font-size:16px;font-weight:800;color:var(--navy);margin-bottom:8px;">Aún no tienes huellas</h3>
            <p style="font-size:13px;color:var(--gris);margin-bottom:20px;">Comparte una publicación de Facebook o YouTube del PEM</p>
            <a href="{{ route('panel.huellas.create') }}"
                style="display:inline-flex;align-items:center;gap:8px;background:var(--caribe);color:#fff;padding:12px 24px;border-radius:var(--radius-s);font-size:14px;font-weight:800;text-decoration:none;font-family:'Nunito',sans-serif;">
                <i class="fas fa-plus"></i> Proponer mi primera huella
            </a>
        </div>
    @endif

</x-app-layout>
