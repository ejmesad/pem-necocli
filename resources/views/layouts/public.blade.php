{{--
  layouts/public.blade.php
  Layout base para todas las páginas públicas del PEM.
--}}
<!doctype html>
<html lang="es">
    
<head>
    @stack('styles')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Plataforma de Educación Municipal · Necoclí')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&family=Nunito+Sans:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    {{-- Font Awesome 6.5.1 (mismo CDN que el resto del proyecto) --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Tailwind compilado vía Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Tokens del sistema de diseño PEM --}}
    <link rel="stylesheet" href="{{ asset('css/pem-tokens.css') }}">

    {{-- Favicon (símbolo PEM) --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-pem-simbolo.svg') }}">

    @stack('head')
</head>
<body class="bg-[var(--bg)] text-[var(--texto)] font-[Nunito_Sans] antialiased">

    @include('partials.brand-strip')
    @include('partials.public-nav')

    <main>
        @yield('content')
    </main>

    @include('partials.public-footer')

    @stack('scripts')
</body>
</html>
