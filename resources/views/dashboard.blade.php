<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <!-- STATS -->
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;margin-bottom:24px;">
        <div style="background:#fff;border-radius:12px;padding:20px;border:1px solid var(--border);box-shadow:var(--shadow);">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,var(--caribe),var(--turquesa));display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px;">
                    <i class="fas fa-thumbtack"></i>
                </div>
                <span style="font-size:13px;font-weight:700;color:var(--gris);">Huellas publicadas</span>
            </div>
            <div style="font-size:2rem;font-weight:900;color:var(--navy);font-family:'Nunito',sans-serif;">0</div>
        </div>
        <div style="background:#fff;border-radius:12px;padding:20px;border:1px solid var(--border);box-shadow:var(--shadow);">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,var(--sol),var(--arena));display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px;">
                    <i class="fas fa-clock"></i>
                </div>
                <span style="font-size:13px;font-weight:700;color:var(--gris);">En revisión</span>
            </div>
            <div style="font-size:2rem;font-weight:900;color:var(--navy);font-family:'Nunito',sans-serif;">0</div>
        </div>
        <div style="background:#fff;border-radius:12px;padding:20px;border:1px solid var(--border);box-shadow:var(--shadow);">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,var(--palma),#5DB87A);display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px;">
                    <i class="fas fa-users"></i>
                </div>
                <span style="font-size:13px;font-weight:700;color:var(--gris);">Usuarios activos</span>
            </div>
            <div style="font-size:2rem;font-weight:900;color:var(--navy);font-family:'Nunito',sans-serif;">3</div>
        </div>
        <div style="background:#fff;border-radius:12px;padding:20px;border:1px solid var(--border);box-shadow:var(--shadow);">
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,var(--lila),#B88DD4);display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px;">
                    <i class="fas fa-layer-group"></i>
                </div>
                <span style="font-size:13px;font-weight:700;color:var(--gris);">Líneas estratégicas</span>
            </div>
            <div style="font-size:2rem;font-weight:900;color:var(--navy);font-family:'Nunito',sans-serif;">4</div>
        </div>
    </div>

    <!-- BIENVENIDA -->
    <div style="background:linear-gradient(135deg,var(--navy),var(--caribe-d));border-radius:16px;padding:28px;color:#fff;position:relative;overflow:hidden;">
        <div style="position:absolute;right:-20px;top:-20px;width:150px;height:150px;background:rgba(255,255,255,0.04);border-radius:50%;"></div>
        <div style="position:relative;z-index:2;">
            <div style="font-size:11px;font-weight:800;color:var(--turquesa);text-transform:uppercase;letter-spacing:1px;margin-bottom:8px;">
                <i class="fas fa-graduation-cap" style="margin-right:4px;"></i> Plan Educativo Municipal
            </div>
            <h2 style="font-size:1.4rem;font-weight:900;margin:0 0 8px;font-family:'Nunito',sans-serif;">
                Bienvenido, {{ Auth::user()->name }} 👋
            </h2>
            <p style="color:rgba(255,255,255,0.7);font-size:13px;margin:0 0 20px;line-height:1.6;">
                Estás en el panel de gestión del PEM Necoclí 2025–2035.
                Tu rol actual es <strong style="color:var(--sol);">{{ Auth::user()->getRoleNames()->first() ?? 'Usuario' }}</strong>.
            </p>
            <a href="{{ url('/') }}" style="display:inline-flex;align-items:center;gap:8px;background:var(--sol);color:var(--navy);padding:10px 20px;border-radius:10px;font-size:13px;font-weight:800;text-decoration:none;font-family:'Nunito',sans-serif;">
                <i class="fas fa-eye"></i> Ver sitio público
            </a>
        </div>
    </div>

</x-app-layout>