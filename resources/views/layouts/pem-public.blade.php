<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PEM Necoclí') — Mesa Municipal de Educación</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Nunito+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/pem-tokens.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-pem-simbolo.svg') }}">
    <style>
        html,body{overflow-x:hidden;}
        body{display:flex;flex-direction:column;min-height:100vh;}
        .pem-topbar{background:var(--pem-navy);color:rgba(255,255,255,.75);font-size:11px;font-weight:600;padding:6px 24px;display:flex;justify-content:center;align-items:center;gap:18px;letter-spacing:.02em;}
        .pem-topbar i{color:var(--pem-sol);margin-right:6px;}
        @media (max-width: 640px){.pem-topbar{font-size:10px;gap:10px;}.pem-topbar .hide-sm{display:none;}}
        .pem-nav{background:var(--pem-white);border-bottom:1px solid var(--pem-border);position:sticky;top:0;z-index:100;box-shadow:0 1px 6px rgba(11,37,64,.04);}
        .pem-nav-inner{max-width:1200px;margin:0 auto;padding:12px 24px;display:flex;align-items:center;gap:24px;}
        .pem-nav-brand img{display:block;height:44px;width:auto;}
        .pem-nav-links{margin-left:auto;display:flex;gap:4px;align-items:center;}
        .pem-nav-links a{padding:9px 16px;color:var(--pem-gris);font-family:var(--pem-font-display);font-weight:700;font-size:13px;border-radius:8px;transition:all .15s;text-decoration:none;}
        .pem-nav-links a:hover{background:var(--pem-bg);color:var(--pem-navy);}
        .pem-nav-links a.active{color:var(--pem-caribe);background:var(--pem-caribe-l);}
        .pem-nav-cta{background:var(--pem-sol)!important;color:#fff!important;box-shadow:0 2px 8px rgba(245,168,32,.3);}
        .pem-nav-cta:hover{background:var(--pem-sol-d)!important;transform:translateY(-1px);}
        .pem-nav-toggle{display:none;background:none;border:none;font-size:22px;color:var(--pem-navy);cursor:pointer;padding:6px;}
        .pem-aliados--header{display:flex;align-items:center;gap:10px;flex-shrink:0;}
        .pem-aliados--header .pem-aliado{display:inline-flex;align-items:center;text-decoration:none;}
        .pem-aliados--header .pem-aliado img{height:34px;width:auto;max-width:80px;object-fit:contain;}
        @media (max-width: 880px){.pem-nav-toggle{display:block;margin-left:auto;}.pem-nav-links{position:absolute;top:100%;left:0;right:0;flex-direction:column;align-items:stretch;background:var(--pem-white);border-top:1px solid var(--pem-border);box-shadow:0 6px 20px rgba(11,37,64,.1);padding:8px;gap:2px;display:none;}.pem-nav-links.open{display:flex;}.pem-nav-links a{padding:12px 16px;text-align:left;}}
        .pem-main{flex:1;}
        .pem-footer{background:var(--pem-navy);color:rgba(255,255,255,.7);margin-top:80px;padding:48px 24px 24px;}
        .pem-footer-inner{max-width:1200px;margin:0 auto;}
        .pem-footer-cols{display:grid;grid-template-columns:1.5fr 1fr 1fr;gap:32px;margin-bottom:32px;}
        @media (max-width: 760px){.pem-footer-cols{grid-template-columns:1fr;gap:24px;}}
        .pem-footer-brand{display:flex;align-items:center;gap:14px;margin-bottom:14px;}
        .pem-footer-brand img{height:60px;width:auto;border-radius:12px;}
        .pem-footer-brand-text strong{color:#fff;font-family:var(--pem-font-display);font-weight:800;font-size:16px;display:block;}
        .pem-footer-brand-text small{font-size:12px;color:var(--pem-sol);font-weight:700;letter-spacing:.04em;}
        .pem-footer p{font-size:13px;line-height:1.6;color:rgba(255,255,255,.6);}
        .pem-footer h4{color:#fff;font-family:var(--pem-font-display);font-weight:800;font-size:13px;text-transform:uppercase;letter-spacing:.08em;margin-bottom:14px;}
        .pem-footer ul{list-style:none;padding:0;margin:0;}
        .pem-footer ul li{margin-bottom:8px;}
        .pem-footer ul a{color:rgba(255,255,255,.6);font-size:13px;text-decoration:none;}
        .pem-footer ul a:hover{color:var(--pem-sol);}
        .pem-footer-bottom{border-top:1px solid rgba(255,255,255,.1);padding-top:20px;display:flex;justify-content:space-between;align-items:center;font-size:11px;color:rgba(255,255,255,.4);flex-wrap:wrap;gap:8px;}
        .container-pem{max-width:1200px;margin:0 auto;padding:0 24px;}
        .section-pad{padding:64px 0;}
    </style>
    @stack('head')
</head>
<body>

<div class="pem-topbar">
    <span><i class="fas fa-map-marker-alt"></i>Necoclí, Antioquia</span>
    <span class="hide-sm"><i class="far fa-envelope"></i>contacto@pem-necocli.co</span>
    <span class="hide-sm"><i class="fas fa-leaf"></i>Plan Educativo Municipal 2024–2034</span>
</div>

<header class="pem-nav">
    <div class="pem-nav-inner">
        
        <a href="{{ url('/') }}" class="pem-nav-brand">
            <img src="{{ asset('images/logo-pem-horizontal.svg') }}" alt="PEM Necoclí">
            <img src="{{ asset('images/logoescnecf.png') }}" alt="Escudo Necoclí" style="height:40px;width:auto;">
            <img src="{{ asset('images/logonecsf.png') }}" alt="Necoclí" style="height:40px;width:auto;">
            <img src="{{ asset('images/logo_fgs.svg') }}" alt="Fundación Grupo Social" style="height:40px;width:auto;">
        </a>
        <button class="pem-nav-toggle" onclick="document.getElementById('pemNavLinks').classList.toggle('open')">
            <i class="fas fa-bars"></i>
        </button>
        <nav class="pem-nav-links" id="pemNavLinks">
            <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Inicio</a>
            <a href="{{ url('/nuestras-huellas') }}" class="{{ request()->is('nuestras-huellas*') ? 'active' : '' }}">Nuestras huellas</a>
            <a href="#acerca">Acerca del PEM</a>
            <a href="#aliados">Aliados</a>
            @auth
                <a href="{{ url('/dashboard') }}" class="pem-nav-cta">Mi panel</a>
            @else
                <a href="{{ route('login') }}" class="pem-nav-cta"><i class="fas fa-sign-in-alt"></i> Ingresar</a>
            @endauth
        </nav>
    </div>
</header>

<main class="pem-main">
    @yield('content')
</main>

<footer class="pem-footer">
    <div class="pem-footer-inner">
        <div class="pem-footer-cols">
            <div>
                <div class="pem-footer-brand">
                    <img src="{{ asset('images/logo-pem-simbolo.svg') }}" alt="">
                    <div class="pem-footer-brand-text">
                        <strong>PEM Necoclí</strong>
                        <small>MESA MUNICIPAL DE EDUCACIÓN</small>
                    </div>
                </div>
                <p>El Plan Educativo Municipal es la apuesta colectiva por una educación pertinente, equitativa y con identidad territorial para Necoclí.</p>
            </div>
            <div>
                <h4>Explorar</h4>
                <ul>
                    <li><a href="{{ url('/nuestras-huellas') }}">Nuestras huellas</a></li>
                    <li><a href="#acerca">Acerca del PEM</a></li>
                    <li><a href="#lineas">Líneas estratégicas</a></li>
                    <li><a href="#colegios">Instituciones</a></li>
                </ul>
            </div>
            <div>
                <h4>Contacto</h4>
                <ul>
                    <li><i class="fas fa-map-marker-alt" style="color:var(--pem-sol);margin-right:6px;"></i> Necoclí, Antioquia</li>
                    <li><i class="far fa-envelope" style="color:var(--pem-sol);margin-right:6px;"></i> contacto@pem-necocli.co</li>
                    <li><i class="fab fa-facebook" style="color:var(--pem-sol);margin-right:6px;"></i> PEM Necoclí</li>
                </ul>
            </div>
        </div>
        <div class="pem-footer-bottom">
            <span>© {{ date('Y') }} PEM Necoclí. Construido con cariño en el Urabá.</span>
            <span>v0.1 — beta</span>
        </div>
    </div>
</footer>

@stack('scripts')
</body>
</html>