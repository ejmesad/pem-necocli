<x-app-layout>
    <x-slot name="header">Cola de Moderación</x-slot>

    @if(session('success'))
        <div style="background:var(--palma-l);border:1px solid var(--palma);border-radius:var(--radius);padding:14px 18px;margin-bottom:20px;color:#1E5F36;font-weight:700;">
            {{ session('success') }}
        </div>
    @endif

    <!-- STATS -->
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-bottom:24px;">
        <div style="background:var(--sol-l);border-radius:var(--radius);padding:16px;text-align:center;border:1px solid #F5D27A;">
            <div style="font-size:1.8rem;font-weight:900;color:var(--sol-d);font-family:'Nunito',sans-serif;">{{ $stats['pending'] }}</div>
            <div style="font-size:11px;font-weight:700;color:var(--sol-d);">⏳ Pendientes</div>
        </div>
        <div style="background:var(--palma-l);border-radius:var(--radius);padding:16px;text-align:center;border:1px solid #8FD4A8;">
            <div style="font-size:1.8rem;font-weight:900;color:#1E5F36;font-family:'Nunito',sans-serif;">{{ $stats['approved'] }}</div>
            <div style="font-size:11px;font-weight:700;color:#1E5F36;">✅ Aprobadas</div>
        </div>
        <div style="background:var(--coral-l);border-radius:var(--radius);padding:16px;text-align:center;border:1px solid #F5C0BA;">
            <div style="font-size:1.8rem;font-weight:900;color:var(--coral);font-family:'Nunito',sans-serif;">{{ $stats['rejected'] }}</div>
            <div style="font-size:11px;font-weight:700;color:var(--coral);">❌ Rechazadas</div>
        </div>
    </div>

    @if($posts->count() > 0)
        <div style="display:grid;gap:12px;">
            @foreach($posts as $post)
                <div style="background:var(--white);border-radius:var(--radius);border:1px solid var(--border);box-shadow:var(--shadow);overflow:hidden;">
                    <div style="padding:16px 20px;display:flex;align-items:flex-start;gap:14px;">
                        <div style="width:44px;height:44px;border-radius:10px;background:{{ $post->platform === 'youtube' ? '#fef0ee' : 'var(--lila-l)' }};display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;">
                            {{ $post->platform === 'youtube' ? '▶️' : '📘' }}
                        </div>
                        <div style="flex:1;min-width:0;">
                            <div style="font-size:14px;font-weight:800;color:var(--texto);margin-bottom:4px;font-family:'Nunito',sans-serif;">{{ $post->title }}</div>
                            @if($post->description)
                                <div style="font-size:12px;color:var(--gris);margin-bottom:6px;">{{ $post->description }}</div>
                            @endif
                            <div style="font-size:11px;color:var(--gris-l);display:flex;flex-wrap:wrap;gap:8px;">
                                <span>👤 {{ $post->submitter->name ?? 'N/A' }}</span>
                                <span>🎯 {{ $post->strategicLine->nombre ?? 'Sin línea' }}</span>
                                <span>🕐 {{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <a href="{{ $post->url }}" target="_blank"
                                style="display:inline-flex;align-items:center;gap:4px;color:var(--caribe);font-size:11px;font-weight:700;margin-top:8px;text-decoration:none;">
                                <i class="fas fa-external-link-alt"></i> Ver publicación original
                            </a>
                        </div>
                    </div>
                    <div style="padding:12px 20px;background:var(--bg);border-top:1px solid var(--border);display:flex;gap:8px;flex-wrap:wrap;">
                        <!-- Aprobar -->
                        <form method="POST" action="{{ route('admin.huellas.approve', $post) }}" style="display:inline;">
                            @csrf @method('PATCH')
                            <button type="submit"
                                style="padding:8px 16px;background:var(--palma);color:#fff;border:none;border-radius:var(--radius-s);font-size:12px;font-weight:800;cursor:pointer;font-family:'Nunito',sans-serif;">
                                ✅ Aprobar
                            </button>
                        </form>

                        <!-- Rechazar -->
                        <form method="POST" action="{{ route('admin.huellas.reject', $post) }}" style="display:inline-flex;align-items:center;gap:6px;">
                            @csrf @method('PATCH')
                            <select name="rejection_reason"
                                style="padding:8px 12px;border:1px solid var(--border);border-radius:var(--radius-s);font-size:12px;font-family:'Nunito Sans',sans-serif;background:var(--white);">
                                <option value="off_topic">Fuera de tema</option>
                                <option value="low_quality">Baja calidad</option>
                                <option value="duplicate">Duplicada</option>
                                <option value="inappropriate">Inapropiada</option>
                            </select>
                            <button type="submit"
                                style="padding:8px 16px;background:var(--coral);color:#fff;border:none;border-radius:var(--radius-s);font-size:12px;font-weight:800;cursor:pointer;font-family:'Nunito',sans-serif;">
                                ❌ Rechazar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="margin-top:20px;">{{ $posts->links() }}</div>
    @else
        <div style="background:var(--white);border-radius:16px;border:1px solid var(--border);padding:48px;text-align:center;">
            <div style="font-size:48px;margin-bottom:16px;">🎉</div>
            <h3 style="font-size:16px;font-weight:800;color:var(--navy);margin-bottom:8px;">¡Cola vacía!</h3>
            <p style="font-size:13px;color:var(--gris);">No hay huellas pendientes de revisión.</p>
        </div>
    @endif

</x-app-layout>