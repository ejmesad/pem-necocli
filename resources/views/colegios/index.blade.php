@extends('layouts.public')

@section('title', 'Instituciones Educativas — PEM Necoclí')

@push('styles')
<style>
.ie-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-top: 24px;
}
@media (max-width: 1024px) { .ie-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 640px)  { .ie-grid { grid-template-columns: repeat(2, 1fr); } }

.ie-card {
    border-radius: 18px;
    border: 1px solid #E5E7EB;
    background: #fff;
    overflow: hidden;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    transition: transform .15s, box-shadow .15s;
}
.ie-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(11,37,64,.13); }

.ie-card-img {
    height: 130px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.ie-card-img img.sede {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.ie-card-logo {
    position: relative;
    z-index: 2;
    width: 60px;
    height: 60px;
    border-radius: 14px;
    background: #fff;
    border: 2px solid #fff;
    box-shadow: 0 4px 12px rgba(0,0,0,.15);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    flex-shrink: 0;
}
.ie-card-logo img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    padding: 4px;
}
.ie-card-logo .ie-initials {
    font-size: 11px;
    font-weight: 800;
    color: #6B7785;
}
.ie-card-body {
    padding: 12px 14px 14px;
    display: flex;
    flex-direction: column;
    gap: 6px;
    flex: 1;
}
.ie-badge {
    display: inline-block;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .06em;
    padding: 2px 8px;
    border-radius: 999px;
}
.ie-badge-rural  { background: #DCFCE7; color: #15803D; }
.ie-badge-urbana { background: #DBEAFE; color: #1D4ED8; }

.ie-name {
    font-family: Nunito, sans-serif;
    font-weight: 800;
    font-size: 13.5px;
    color: #0B2540;
    line-height: 1.3;
    margin: 0;
}
.ie-addr {
    font-size: 11px;
    color: #6B7785;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.ie-stats {
    display: flex;
    gap: 10px;
    font-size: 11px;
    color: #6B7785;
    margin-top: auto;
}

/* Filtros */
.ie-toolbar {
    display: flex;
    gap: 10px;
    align-items: center;
    flex-wrap: wrap;
    margin: 20px 0 0;
}
.ie-search {
    flex: 1;
    min-width: 180px;
    max-width: 360px;
    height: 38px;
    padding: 0 14px;
    border-radius: 10px;
    border: 1px solid #E5E7EB;
    font-size: 13px;
    color: #1F2937;
    outline: none;
    background: #fff;
    box-shadow: 0 1px 2px rgba(0,0,0,.04);
}
.ie-search:focus { border-color: #0891B2; }
</style>
@endpush

@section('content')
<div style="max-width:1280px;margin:0 auto;padding:36px 28px;">

    {{-- Encabezado --}}
    <p style="font-size:11px;font-weight:700;color:#6B7785;text-transform:uppercase;letter-spacing:.08em;margin-bottom:6px;">
        Plan Educativo Municipal · Necoclí
    </p>
    <h1 style="font-family:Nunito,sans-serif;font-weight:800;font-size:28px;color:#0B2540;margin-bottom:6px;">
        Instituciones Educativas de Necoclí
    </h1>
    <p style="font-size:13px;color:#6B7785;">
        {{ $schools->count() }} IE registradas —
        {{ $schools->where('type','Urbana')->count() }} urbanas y
        {{ $schools->where('type','Rural')->count() }} rurales.
        Cada IE tiene su perfil con avances, proyectos y huellas.
    </p>

    {{-- Toolbar --}}
    <div class="ie-toolbar">
        <input type="text" id="buscador" class="ie-search"
               placeholder="Buscar IE o vereda..." oninput="filtrar()">
        <button onclick="setTipo('todas')" id="btn-todas" class="pem-btn pem-btn-sm pem-btn-caribe">Todas</button>
        <button onclick="setTipo('Rural')"  id="btn-Rural"  class="pem-btn pem-btn-sm pem-btn-ghost">
            <i class="fas fa-tree" style="color:#16A34A"></i> Rurales
        </button>
        <button onclick="setTipo('Urbana')" id="btn-Urbana" class="pem-btn pem-btn-sm pem-btn-ghost">
            <i class="fas fa-city" style="color:#0891B2"></i> Urbanas
        </button>
    </div>

    {{-- Grid --}}
    @php
        $fondos = ['#FEF9C3','#FCE7F3','#E0F2FE','#FEF3C7','#F0FDF4','#EDE9FE','#FFF7ED','#F0FDFA'];
        $ci = 0;
    @endphp
    <div class="ie-grid" id="grid-colegios">
        @foreach ($schools as $school)
        @php $fondo = $fondos[$ci++ % count($fondos)]; @endphp
        <a href="{{ route('colegios.show', $school) }}"
           class="ie-card"
           data-type="{{ $school->type }}"
           data-nombre="{{ strtolower($school->name . ' ' . ($school->address ?? '')) }}">

            {{-- Imagen --}}
            <div class="ie-card-img" style="background:{{ $fondo }};">
                @if ($school->cover_url)
                    <img class="sede" src="{{ asset($school->cover_url) }}" alt="Sede {{ $school->name }}">
                @endif
                <div class="ie-card-logo">
                    <img src="{{ asset($school->logo_url) }}"
                         alt="Logo {{ $school->name }}"
                         onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <span class="ie-initials" style="display:none">IER</span>
                </div>
            </div>

            {{-- Info --}}
            <div class="ie-card-body">
                <span class="ie-badge {{ $school->type === 'Urbana' ? 'ie-badge-urbana' : 'ie-badge-rural' }}">
                    {{ $school->type }}
                </span>
                <p class="ie-name">{{ $school->name }}</p>
                @if ($school->address)
                    <p class="ie-addr">
                        <i class="fas fa-location-dot" style="color:#E8756A;font-size:10px;"></i>
                        {{ Str::after($school->address, 'Vereda ') }}
                    </p>
                @endif
                <div class="ie-stats">
                    @if ($school->students_count)
                        <span><i class="fas fa-user-graduate" style="color:#0891B2"></i> {{ number_format($school->students_count) }}</span>
                    @endif
                    @if ($school->teachers_count)
                        <span><i class="fas fa-chalkboard-user" style="color:#2D8A4E"></i> {{ $school->teachers_count }}</span>
                    @endif
                </div>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Empty state --}}
    <div id="empty-state" style="display:none;text-align:center;padding:60px 0;color:#6B7785;">
        <i class="fas fa-school" style="font-size:2.5rem;margin-bottom:12px;display:block;"></i>
        <p style="font-weight:700;">No hay instituciones que coincidan.</p>
    </div>

</div>

@push('scripts')
<script>
let tipoActivo = 'todas';

function setTipo(tipo) {
    tipoActivo = tipo;
    ['todas','Rural','Urbana'].forEach(t => {
        const btn = document.getElementById('btn-' + t);
        if (!btn) return;
        btn.classList.toggle('pem-btn-caribe', t === tipo);
        btn.classList.toggle('pem-btn-ghost',  t !== tipo);
    });
    filtrar();
}

function filtrar() {
    const q = document.getElementById('buscador').value.toLowerCase().trim();
    const cards = document.querySelectorAll('#grid-colegios .ie-card');
    let visibles = 0;
    cards.forEach(c => {
        const okTipo  = tipoActivo === 'todas' || c.dataset.type === tipoActivo;
        const okBusca = !q || c.dataset.nombre.includes(q);
        c.style.display = (okTipo && okBusca) ? '' : 'none';
        if (okTipo && okBusca) visibles++;
    });
    document.getElementById('empty-state').style.display = visibles ? 'none' : 'block';
}
</script>
@endpush
@endsection
