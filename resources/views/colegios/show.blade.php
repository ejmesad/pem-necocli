{{--
  ============================================================================
  resources/views/colegios/show.blade.php
  Colegio detalle (M5) — Plataforma de Educación Municipal
  ============================================================================

  ROUTE:
    Route::get('/colegios/{school:slug}', [SchoolController::class, 'show'])
        ->name('colegios.show');

  CONTROLLER EJEMPLO:
    public function show(School $school)
    {
        $school->loadMissing(['rector', 'sedes']);

        // Proyectos del colegio agrupados por slug de línea estratégica.
        // Asume relación School::projects() belongsToMany.
        $projectsByLine = $school->projects()
            ->with('strategicLine')
            ->where('active', true)
            ->get()
            ->groupBy(fn ($p) => $p->strategicLine->slug);

        // Avance del colegio por línea (promedio de progress de sus proyectos).
        // Devuelve [slug => float 0..1] para las 4 líneas siempre.
        $avancePorLinea = collect(['equidad-trayectorias','calidad-innovacion','identidad-territorial','gestion-gobernanza'])
            ->mapWithKeys(fn ($slug) => [
                $slug => $projectsByLine->has($slug)
                    ? round($projectsByLine[$slug]->avg('progress'), 2)
                    : 0,
            ]);

        // 4 líneas estratégicas en BD — ordenadas
        $lines = StrategicLine::orderBy('order')->get();

        return view('colegios.show', compact('school', 'projectsByLine', 'avancePorLinea', 'lines'));
    }

  MODELO ESPERADO (campos referenciados aquí):
    School:
      id, name, slug, type ('Rural'|'Urbana'), municipality, address, email,
      phone, description, founded_year, logo_url, cover_url, website_url,
      students_count, teachers_count, location_lat, location_lng,
      social_links (JSON: {facebook, youtube, instagram}), active
    School::rector() → User (name, email, role_since)
    School::sedes() → Sede[] (id, name, address, is_main, location_lat, location_lng)
    School::projects() → Project[]
    Project: title, slug, progress (0..1), goals_count, goals_done_count, strategic_line_id
    StrategicLine: id, slug, nombre, color_token (caribe|sol|palma|lila), badge_token, order
  ============================================================================
--}}

@extends('layouts.public')

@section('title', $school->name . ' — Colegios PEM')

@section('content')
<div class="px-12 py-9 max-w-[1280px] mx-auto">

    {{-- ── Breadcrumb ───────────────────────────────────────────────────── --}}
    <a href="{{ route('colegios.index') }}"
       class="text-xs text-[var(--gris)] inline-flex items-center gap-2 mb-4 no-underline hover:text-[var(--navy)]">
        <i class="fas fa-arrow-left"></i>
        Inicio · Colegios · {{ $school->name }}
    </a>

    {{-- ── Header card: logo+info | foto sede ─────────────────────────── --}}
    <article class="pem-card !p-0 overflow-hidden grid grid-cols-[1.2fr_1fr] mb-5">
        <div class="p-7 flex flex-col gap-4">
            <div class="flex gap-5 items-start">
                {{-- Logo del colegio --}}
                @if ($school->logo_url)
                    <img src="{{ asset($school->logo_url) }}"
                         alt="Logo de {{ $school->name }}"
                         class="w-[92px] h-[92px] rounded-2xl object-contain bg-[var(--arena-l)] border border-[var(--border)] flex-shrink-0">
                @else
                    <div class="w-[92px] h-[92px] rounded-2xl bg-[var(--arena-l)] border border-dashed border-[var(--border-2)]
                                flex items-center justify-center text-[var(--gris)] text-xs uppercase tracking-wider font-bold flex-shrink-0">
                        Logo
                    </div>
                @endif

                <div class="flex-1 min-w-0">
                    <div class="flex gap-2 flex-wrap mb-2">
                        <span class="pem-tag pem-tag-caribe">{{ $school->type }}</span>
                        @if ($school->founded_year)
                            <span class="pem-tag">Fundada en {{ $school->founded_year }}</span>
                        @endif
                        @if ($school->active)
                            <span class="inline-flex items-center gap-1.5 text-xs font-bold text-[var(--palma)]">
                                <span class="w-1.5 h-1.5 rounded-full bg-[var(--palma)]"></span>
                                Activa
                            </span>
                        @endif
                    </div>

                    <h1 class="text-[26px] leading-tight font-extrabold text-[var(--navy)] tracking-tight mb-2 font-[Nunito]">
                        {{ $school->name }}
                    </h1>

                    <div class="flex flex-col gap-1 text-[12.5px] text-[var(--gris)]">
                        <span><i class="fas fa-location-dot w-4 text-[var(--coral)]"></i> {{ $school->address }}</span>
                        @if ($school->email)
                            <span><i class="fas fa-envelope w-4"></i> {{ $school->email }}</span>
                        @endif
                        @if ($school->phone)
                            <span><i class="fas fa-phone w-4"></i> {{ $school->phone }}</span>
                        @endif
                    </div>
                </div>
            </div>

            @if ($school->description)
                <p class="text-[13.5px] text-[var(--texto)] m-0" style="text-wrap: pretty">
                    {{ $school->description }}
                </p>
            @endif

            <div class="flex gap-2 mt-1">
                @if ($school->website_url)
                    <a href="{{ $school->website_url }}" target="_blank" rel="noopener"
                       class="pem-btn pem-btn-sm pem-btn-caribe">
                        <i class="fas fa-globe"></i> Visitar sitio
                    </a>
                @endif
                @if ($school->location_lat && $school->location_lng)
                    <a href="https://www.google.com/maps?q={{ $school->location_lat }},{{ $school->location_lng }}"
                       target="_blank" rel="noopener"
                       class="pem-btn pem-btn-sm pem-btn-ghost">
                        <i class="fas fa-map"></i> Ver en mapa
                    </a>
                @endif
                <button type="button" class="pem-btn pem-btn-sm pem-btn-ghost">
                    <i class="fas fa-share-nodes"></i> Compartir
                </button>
            </div>
        </div>

        {{-- Foto de la sede principal --}}
        @php $cover = $school->cover_url ?? optional($school->sedes->firstWhere('is_main', true))->cover_url; @endphp
        @if ($cover)
            <img src="{{ asset($cover) }}"
                 alt="Sede de {{ $school->name }}"
                 class="w-full h-full min-h-[320px] object-cover">
        @else
            <div class="pem-placeholder min-h-[320px]">foto de la sede</div>
        @endif
    </article>

    {{-- ── KPIs ──────────────────────────────────────────────────────── --}}
    <div class="grid grid-cols-4 gap-3 mb-5">
        @php
            $kpis = [
                ['fa-user-graduate',  number_format($school->students_count, 0, ',', '.'), 'Estudiantes',       'caribe'],
                ['fa-chalkboard-user', $school->teachers_count,                              'Docentes',          'palma'],
                ['fa-building',        $school->sedes->count(),                              'Sedes',             'sol-d'],
                ['fa-diagram-project', $projectsByLine->flatten()->count(),                  'Proyectos activos', 'lila'],
            ];
        @endphp
        @foreach ($kpis as [$icon, $value, $label, $tone])
            <div class="pem-card flex items-center gap-3.5">
                <div class="w-11 h-11 rounded-xl flex items-center justify-center text-lg flex-shrink-0"
                     style="background: color-mix(in oklch, var(--{{ $tone }}) 14%, white); color: var(--{{ $tone }})">
                    <i class="fas {{ $icon }}"></i>
                </div>
                <div>
                    <div class="font-[Nunito] font-extrabold text-[26px] text-[var(--navy)] leading-none tracking-tight">
                        {{ $value }}
                    </div>
                    <div class="text-[11px] text-[var(--gris)] font-semibold uppercase tracking-[0.06em] mt-0.5">
                        {{ $label }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- ── Main grid: contenido + sidebar ───────────────────────────── --}}
    <div class="grid grid-cols-[1fr_320px] gap-6">

        {{-- ── MAIN COLUMN ──────────────────────────────────────────── --}}
        <div>

            {{-- Avance por línea estratégica --}}
            <section class="mb-6">
                <h3 class="text-lg font-extrabold text-[var(--navy)] tracking-tight font-[Nunito]">
                    Avance del colegio por línea estratégica
                </h3>
                <p class="text-sm text-[var(--gris)] mt-1 mb-3.5">
                    Cálculo agregado de los proyectos del colegio en cada una de las 4 líneas del PEM.
                </p>
                <div class="grid grid-cols-2 gap-3">
                    @foreach ($lines as $line)
                        @php
                            $slug      = $line->color_token;            // caribe|sol|palma|lila
                            $count     = $projectsByLine->get($line->slug, collect())->count();
                            $progress  = $avancePorLinea[$line->slug] ?? 0;
                            $progressP = round($progress * 100);
                            $textTone  = $slug === 'sol' ? 'sol-d' : $slug;
                        @endphp
                        <div class="pem-card !p-4">
                            <div class="flex items-center gap-2 mb-2">
                                @include('partials.line-tag', ['line' => $line, 'short' => true])
                                <span class="ml-auto font-[Nunito] font-extrabold text-2xl"
                                      style="color: var(--{{ $textTone }})">
                                    {{ $progressP }}%
                                </span>
                            </div>
                            <div class="text-[13px] text-[var(--navy)] font-bold mb-2.5 leading-tight">
                                {{ $line->nombre }}
                            </div>
                            <div class="pem-progress h-2">
                                <i style="width: {{ $progressP }}%; background: var(--{{ $slug }})"></i>
                            </div>
                            <div class="text-[11.5px] text-[var(--gris)] mt-1.5">
                                {{ $count }} {{ $count === 1 ? 'proyecto' : 'proyectos' }} en esta línea
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- Proyectos del colegio agrupados por línea --}}
            <section>
                <div class="flex items-end justify-between mb-3.5">
                    <div>
                        <h3 class="text-lg font-extrabold text-[var(--navy)] tracking-tight font-[Nunito]">
                            Proyectos del colegio
                        </h3>
                        <p class="text-sm text-[var(--gris)] mt-1">
                            {{ $projectsByLine->flatten()->count() }} proyectos activos · agrupados por línea estratégica
                        </p>
                    </div>
                </div>

                @foreach ($lines as $line)
                    @php
                        $slug     = $line->color_token;
                        $projects = $projectsByLine->get($line->slug, collect());
                    @endphp
                    <div class="mb-4">
                        <div class="flex items-center gap-2 mb-2">
                            @include('partials.line-tag', ['line' => $line])
                            <span class="text-[11.5px] text-[var(--gris)]">
                                {{ $projects->count() }} {{ $projects->count() === 1 ? 'proyecto' : 'proyectos' }}
                            </span>
                            <span class="flex-1 h-px bg-[var(--border)] ml-1"></span>
                        </div>

                        @if ($projects->isEmpty())
                            <div class="pem-card !p-3.5 text-center text-xs text-[var(--gris)]
                                        bg-[var(--arena-l)] border-dashed">
                                <i class="fas fa-circle-info"></i>
                                Aún no hay proyectos del colegio en esta línea.
                            </div>
                        @else
                            <div class="grid grid-cols-2 gap-2.5">
                                @foreach ($projects as $project)
                                    @php $p = round($project->progress * 100); @endphp
                                    <a href="{{ '#' }}"
                                       class="pem-card !p-3.5 flex flex-col gap-1.5 no-underline">
                                        <div class="font-[Nunito] font-extrabold text-sm text-[var(--navy)] leading-tight">
                                            {{ $project->name }}
                                        </div>
                                        <div class="text-[11.5px] text-[var(--gris)]">
                                            {{ $project->goals_done_count }} de {{ $project->goals_count }} metas
                                        </div>
                                        <div class="pem-progress h-1.5 mt-0.5">
                                            <i style="width: {{ $p }}%; background: var(--{{ $slug }})"></i>
                                        </div>
                                        <div class="text-[11px] text-[var(--gris)] font-bold text-right">{{ $p }}%</div>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </section>
        </div>

        {{-- ── SIDEBAR ─────────────────────────────────────────────── --}}
        <aside class="flex flex-col gap-3.5">

            {{-- Rector --}}
            @if ($school->rector)
                <div class="pem-card">
                    <h4 class="pem-side-title">Rector</h4>
                    <div class="flex gap-2.5 items-center">
                        <div class="w-[52px] h-[52px] rounded-full bg-gradient-to-br from-[var(--palma-l)] to-[var(--palma)]
                                    text-white font-[Nunito] font-extrabold text-lg flex items-center justify-center flex-shrink-0">
                            {{ \Illuminate\Support\Str::of($school->rector->name)->explode(' ')->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('') }}
                        </div>
                        <div>
                            <div class="font-[Nunito] font-extrabold text-sm text-[var(--navy)]">
                                {{ $school->rector->name }}
                            </div>
                            @if ($school->rector->role_since)
                                <div class="text-[11px] text-[var(--gris)] mt-0.5">
                                    Rector(a) desde {{ $school->rector->role_since->translatedFormat('M Y') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    @if ($school->rector->email)
                        <div class="text-xs text-[var(--gris)] mt-2.5 pt-2.5 border-t border-[var(--border)]">
                            <i class="fas fa-envelope w-3.5"></i> {{ $school->rector->email }}
                        </div>
                    @endif
                </div>
            @endif

            {{-- Sedes --}}
            <div class="pem-card">
                <h4 class="pem-side-title">Sedes</h4>
                @forelse ($school->sedes as $sede)
                    <div class="flex gap-2.5 items-center {{ ! $loop->last ? 'pb-2.5 mb-2.5 border-b border-[var(--border)]' : '' }}">
                        <i class="fas fa-building w-8 h-8 rounded-lg bg-[var(--tur-l)] text-[var(--caribe-d)] inline-flex items-center justify-center"></i>
                        <div class="flex-1 min-w-0">
                            <div class="font-[Nunito] font-extrabold text-[13px] text-[var(--navy)]">{{ $sede->name }}</div>
                            <div class="text-[11px] text-[var(--gris)] truncate">{{ $sede->address }}</div>
                        </div>
                        @if ($sede->is_main)
                            <i class="fas fa-circle-check text-[var(--palma)]" title="Sede principal"></i>
                        @endif
                    </div>
                @empty
                    <div class="text-xs text-[var(--gris)]">Sin sedes registradas.</div>
                @endforelse
            </div>

            {{-- Ubicación --}}
            @if ($school->location_lat && $school->location_lng)
                <div class="pem-card">
                    <h4 class="pem-side-title">Ubicación</h4>
                    <div class="pem-placeholder h-[140px] rounded-lg mb-2">mapa · lat/lng</div>
                    <div class="text-xs text-[var(--gris)]">
                        {{ number_format($school->location_lat, 4) }}°N,
                        {{ number_format(abs($school->location_lng), 4) }}°W
                    </div>
                </div>
            @endif

            {{-- Redes sociales --}}
            @if (! empty($school->social_links))
                <div class="pem-card">
                    <h4 class="pem-side-title">Redes sociales</h4>
                    <div class="flex flex-col gap-2">
                        @foreach ($school->social_links as $platform => $handle)
                            @php
                                $iconMap = [
                                    'facebook'  => ['fab fa-facebook-f',  '#1877f2'],
                                    'youtube'   => ['fab fa-youtube',     '#ff0000'],
                                    'instagram' => ['fab fa-instagram',   '#E1306C'],
                                    'twitter'   => ['fab fa-x-twitter',   '#000'],
                                    'tiktok'    => ['fab fa-tiktok',      '#000'],
                                ];
                                [$icon, $color] = $iconMap[$platform] ?? ['fas fa-link', 'var(--gris)'];
                            @endphp
                            <a href="{{ $handle }}" target="_blank" rel="noopener"
                               class="flex items-center gap-2.5 text-sm text-[var(--navy)] no-underline hover:text-[var(--caribe)]">
                                <i class="{{ $icon }} w-4" style="color: {{ $color }}"></i>
                                {{ \Illuminate\Support\Str::after($handle, '.com/') ?: $handle }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </aside>
    </div>
</div>
@endsection