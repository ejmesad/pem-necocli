<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'PEM Necoclí') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Nunito+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root{
            --sol:#F5A820;--sol-l:#FFF3D6;--sol-d:#C8840A;
            --caribe:#0891B2;--caribe-d:#076F90;
            --turquesa:#05C2D8;--tur-l:#E0F9FC;
            --palma:#2D8A4E;--palma-l:#EFF8F2;
            --arena:#C8904A;--arena-l:#FBF5E8;
            --coral:#E8756A;--coral-l:#FEF0EE;
            --lila:#8B52B0;--lila-l:#F3EEF8;
            --navy:#0B2540;--texto:#1A3344;
            --gris:#5A6B82;--gris-l:#94A3B8;
            --border:#E2EBF4;--bg:#F5F4EF;--white:#FFFFFF;
            --sidebar-w:240px;--topbar-h:56px;
            --radius:12px;--radius-s:8px;
            --shadow:0 2px 12px rgba(11,37,64,.08);
            --shadow-m:0 4px 20px rgba(11,37,64,.12);
        }
        *{box-sizing:border-box;margin:0;padding:0;}
        body{font-family:'Nunito Sans',sans-serif;background:var(--bg);color:var(--texto);font-size:14px;}
        h1,h2,h3,h4,h5,h6{font-family:'Nunito',sans-serif;}
        a{color:var(--caribe);text-decoration:none;}

        /* SHELL */
        .app-shell{display:flex;min-height:100vh;}

        /* SIDEBAR */
        .sidebar{width:var(--sidebar-w);min-width:var(--sidebar-w);background:var(--navy);display:flex;flex-direction:column;height:100vh;position:fixed;top:0;left:0;z-index:100;overflow-y:auto;}
        .sidebar-brand{padding:18px 20px 14px;border-bottom:1px solid rgba(255,255,255,.07);display:flex;align-items:center;gap:10px;}
        .brand-orb{width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,var(--turquesa),var(--caribe));display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:900;color:#fff;font-family:'Nunito',sans-serif;flex-shrink:0;}
        .brand-name{font-size:13px;font-weight:800;color:#fff;font-family:'Nunito',sans-serif;line-height:1.2;}
        .brand-tag{font-size:9px;color:var(--sol);font-weight:700;text-transform:uppercase;letter-spacing:.08em;}
        .sidebar-section{padding:14px 12px 4px;font-size:9px;font-weight:800;color:rgba(255,255,255,.3);text-transform:uppercase;letter-spacing:.12em;font-family:'Nunito',sans-serif;}
        .nav-item{display:flex;align-items:center;gap:10px;padding:9px 12px;margin:2px 8px;border-radius:var(--radius-s);color:rgba(255,255,255,.55);font-size:12.5px;font-weight:600;cursor:pointer;transition:all .15s;font-family:'Nunito',sans-serif;text-decoration:none;position:relative;}
        .nav-item:hover{background:rgba(255,255,255,.07);color:rgba(255,255,255,.85);}
        .nav-item.active{background:rgba(5,194,216,.18);color:var(--turquesa);font-weight:700;}
        .nav-item.active::before{content:'';position:absolute;left:0;top:20%;bottom:20%;width:3px;border-radius:0 3px 3px 0;background:var(--turquesa);}
        .nav-item i{width:18px;text-align:center;font-size:14px;}
        .sidebar-footer{margin-top:auto;padding:14px 12px;border-top:1px solid rgba(255,255,255,.07);}

        /* MAIN */
        .main{flex:1;margin-left:var(--sidebar-w);display:flex;flex-direction:column;min-height:100vh;}

        /* TOPBAR */
        .topbar{height:var(--topbar-h);background:var(--white);border-bottom:1px solid var(--border);display:flex;align-items:center;padding:0 24px;gap:12px;position:sticky;top:0;z-index:50;box-shadow:var(--shadow);}
        .topbar-title{font-size:16px;font-weight:800;color:var(--navy);font-family:'Nunito',sans-serif;}
        .topbar-right{margin-left:auto;display:flex;align-items:center;gap:12px;}
        .user-badge{display:flex;align-items:center;gap:8px;padding:6px 12px;border-radius:var(--radius-s);background:var(--bg);border:1px solid var(--border);}
        .user-avatar{width:28px;height:28px;border-radius:8px;background:linear-gradient(135deg,var(--caribe),var(--turquesa));display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:800;color:#fff;font-family:'Nunito',sans-serif;}
        .user-name{font-size:12px;font-weight:700;color:var(--texto);}
        .user-role{font-size:10px;color:var(--gris-l);}

        /* PAGE */
        .page-scroll{flex:1;padding:24px;overflow-x:hidden;}

        /* MOBILE */
        @media(max-width:768px){
            .sidebar{transform:translateX(-100%);transition:transform .3s;}
            .sidebar.open{transform:translateX(0);}
            .main{margin-left:0;}
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="app-shell">

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-orb">P</div>
            <div>
                <div class="brand-name">PEM Necoclí</div>
                <div class="brand-tag">Panel de gestión</div>
            </div>
        </div>

        <div class="sidebar-section">Principal</div>
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i> Dashboard
        </a>

        @can('huellas:submit')
        <div class="sidebar-section">Huellas</div>
        <a href="#" class="nav-item">
            <i class="fas fa-plus-circle"></i> Proponer Huella
        </a>
        <a href="#" class="nav-item">
            <i class="fas fa-list"></i> Mis Envíos
        </a>
        @endcan

        @can('huellas:moderate')
        <div class="sidebar-section">Moderación</div>
        <a href="#" class="nav-item">
            <i class="fas fa-clock"></i> Cola de revisión
        </a>
        <a href="#" class="nav-item">
            <i class="fas fa-check-circle"></i> Publicadas
        </a>
        @endcan

        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-item" style="width:100%;background:none;border:none;cursor:pointer;">
                    <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="main">
        <header class="topbar">
            @isset($header)
                <span class="topbar-title">{{ $header }}</span>
            @endisset
            <div class="topbar-right">
                <div class="user-badge">
                    <div class="user-avatar">{{ substr(Auth::user()->name, 0, 2) }}</div>
                    <div>
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">{{ Auth::user()->getRoleNames()->first() ?? 'Usuario' }}</div>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-scroll">
            {{ $slot }}
        </div>
    </div>

</div>
@stack('scripts')
</body>
</html>