{{-- partials/public-nav.blade.php --}}
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-[var(--border)]">
    <div class="max-w-[1280px] mx-auto px-7 h-14 flex items-center gap-6">
        {{-- Logo PEM → enlaza a Quiénes Somos --}}
        <a href="{{ route('quienes-somos') }}"
           class="flex items-center gap-2.5 no-underline flex-shrink-0">
            <img src="{{ asset('images/logo-pem-simbolo.svg') }}"
                 alt="PEM" class="h-8 w-auto"
                 onerror="this.style.display='none'">
            <span class="font-[Nunito] font-extrabold text-[15px] text-[var(--navy)] leading-tight">
                PEM<br>
                <span class="text-[10px] font-semibold text-[var(--gris)] tracking-wide uppercase">Necoclí</span>
            </span>
        </a>
        <span class="flex-1"></span>
        {{-- Links principales --}}
        <div class="flex items-center gap-1">
            <a href="{{ route('home') }}"
               class="px-3 py-1.5 rounded-lg text-[13px] font-bold no-underline transition-colors
                      {{ request()->routeIs('home') ? 'bg-[var(--navy)] text-white' : 'text-[var(--gris)] hover:bg-[var(--arena-l)] hover:text-[var(--navy)]' }}">
                Inicio
            </a>
            <a href="{{ route('colegios.index') }}"
               class="px-3 py-1.5 rounded-lg text-[13px] font-bold no-underline transition-colors
                      {{ request()->routeIs('colegios.*') ? 'bg-[var(--navy)] text-white' : 'text-[var(--gris)] hover:bg-[var(--arena-l)] hover:text-[var(--navy)]' }}">
                Instituciones
            </a>
            {{-- Líneas y Proyectos — próximamente (M2/M3) --}}
            <span class="px-3 py-1.5 rounded-lg text-[13px] font-bold text-[var(--gris-l)] cursor-not-allowed"
                  title="Próximamente">
                Líneas
            </span>
            <span class="px-3 py-1.5 rounded-lg text-[13px] font-bold text-[var(--gris-l)] cursor-not-allowed"
                  title="Próximamente">
                Proyectos
            </span>
        </div>
    </div>
</nav>