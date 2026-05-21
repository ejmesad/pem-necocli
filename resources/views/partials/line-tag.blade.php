{{--
  partials/line-tag.blade.php
  Chip/badge de línea estratégica del PEM.

  VARIABLES esperadas:
    $line   — StrategicLine (campos: color_token, nombre)
    $short  — bool (opcional, default false) → abreviar el nombre a 2 palabras

  TOKENS válidos en $line->color_token: caribe | sol | palma | lila
  Las clases .pem-line-tag-* están definidas en pem-tokens.css.

  USO:
    @include('partials.line-tag', ['line' => $line])
    @include('partials.line-tag', ['line' => $line, 'short' => true])
--}}

@php
    $token = $line->color_token;   // 'caribe' | 'sol' | 'palma' | 'lila'

    // Etiquetas cortas para espacios reducidos (sidebar, chips de avance)
    $labels = [
        'caribe' => 'Equidad',
        'sol'    => 'Calidad',
        'palma'  => 'Identidad',
        'lila'   => 'Gestión',
    ];

    $label = (isset($short) && $short)
        ? ($labels[$token] ?? $line->nombre)
        : $line->nombre;
@endphp

<span class="pem-tag pem-line-tag-{{ $token }}">
    {{ $label }}
</span>