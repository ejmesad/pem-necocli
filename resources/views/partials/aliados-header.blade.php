{{-- ═══════════════════════════════════════════════════════════════
     PEM NECOCLÍ — PARTIAL: ESCUDOS ALIADOS
     Ubicación: resources/views/partials/aliados-header.blade.php
     Uso:
       @include('partials.aliados-header')
       @include('partials.aliados-header', ['variante' => 'footer'])
     ═══════════════════════════════════════════════════════════════ --}}

@php
    $variante = $variante ?? 'header';
@endphp

<div class="pem-aliados pem-aliados--{{ $variante }}" role="group" aria-label="Aliados institucionales">

    {{-- 1. Escudo oficial Alcaldía de Necoclí --}}
    <a href="https://www.necocli-antioquia.gov.co/" target="_blank" rel="noopener"
       class="pem-aliado" title="Alcaldía Municipal de Necoclí">
        <img src="{{ asset('images/logoescnecf.png') }}"
             alt="Escudo Alcaldía de Necoclí"
             loading="lazy"
             decoding="async"
             style="height:40px;width:auto;display:block;">
    </a>

    {{-- 2. Marca ciudad "Necoclí, tú perteneces aquí" --}}
    <a href="https://www.necocli-antioquia.gov.co/" target="_blank" rel="noopener"
       class="pem-aliado" title="Necoclí, tú perteneces aquí">
        <img src="{{ asset('images/logonecsf.png') }}"
             alt="Necoclí, tú perteneces aquí"
             loading="lazy"
             decoding="async"
             style="height:40px;width:auto;display:block;">
    </a>

    {{-- 3. Fundación Grupo Social --}}
    <a href="https://www.fundaciongruposocial.co/" target="_blank" rel="noopener"
       class="pem-aliado" title="Fundación Grupo Social">
        <img src="{{ asset('images/logo_fgs.svg') }}"
             alt="Fundación Grupo Social"
             loading="lazy"
             decoding="async"
             style="height:40px;width:auto;display:block;">
    </a>

</div>



<img src="{{ asset('images/logoescnecf.png') }}" alt="Escudo Necoclí" >
<img src="{{ asset('images/logonecsf.png') }}" alt="Necoclí tú perteneces aquí" style="height:40px;width:auto;display:block;">
<img src="{{ asset('images/logo_fgs.svg') }}" alt="Fundación Grupo Social" style="height:40px;width:auto;display:block;">