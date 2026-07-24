{{-- ════════════════════════════════════════════════════════════════
     PEM NECOCLÍ — HOME (v2 — árbol PEM + playa mejorada)
     resources/views/home.blade.php
     ════════════════════════════════════════════════════════════════ --}}
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Mesa de Educación Necoclí – Plan Educativo Municipal</title>
<link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-pem-simbolo.svg') }}">
<style>
*{box-sizing:border-box;margin:0;padding:0;}
:root{
  --navy:#1A3A5C;--caribe:#0891B2;--caribe-d:#0E7490;--caribe-v:#06B6D4;
  --arena:#E8A87C;--arena-l:#FDF5EE;--arena-d:#C8782A;
  --palma:#16A34A;--palma-l:#DCFCE7;
  --sol:#F59E0B;--sol-l:#FEF3C7;
  --gris:#64748B;--gris-l:#94A3B8;--border:#E8EDF5;--bg:#F7F9FC;
}
body{font-family:'Segoe UI',system-ui,-apple-system,sans-serif;background:#fff;color:var(--navy);-webkit-font-smoothing:antialiased;}
a{text-decoration:none;color:inherit;}
button{font-family:inherit;cursor:pointer;}

.topbar{background:var(--navy);color:rgba(255,255,255,.7);font-size:11px;padding:5px 24px;text-align:center;}
.topbar b{color:#67E8F9;font-weight:600;}

/* Header con árbol PEM + aliados */
.allies-bar{background:#fff;border-bottom:1px solid var(--border);padding:18px 24px;}
.allies-inner{max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:flex-start;gap:24px;flex-wrap:wrap;}
.ally-logo{display:flex;align-items:center;justify-content:center;height:40px;}

/* Logo PEM (árbol) — identidad propia */
.pem-tree img{height:64px;width:auto;display:block;}
.ally-sep{width:1px;height:48px;background:var(--border);align-self:center;}

/* Logo Necoclí turístico (placeholder) */
.logo-necocli{display:flex;flex-direction:column;align-items:center;line-height:1;}
.logo-necocli-letters{font-family:'Comic Sans MS','Trebuchet MS',sans-serif;font-weight:900;font-size:30px;letter-spacing:-1px;font-style:italic;}
.logo-necocli-letters .l1{color:#E8A87C;}.logo-necocli-letters .l2{color:#06B6D4;}.logo-necocli-letters .l3{color:#16A34A;}.logo-necocli-letters .l4{color:#F59E0B;}.logo-necocli-letters .l5{color:#C8202C;}.logo-necocli-letters .l6{color:#8B52B0;}.logo-necocli-letters .l7{color:#0891B2;}
.logo-necocli-sub{font-size:8px;color:var(--gris);text-transform:uppercase;letter-spacing:.2em;margin-top:2px;font-family:'Segoe UI',sans-serif;font-style:normal;font-weight:600;}

/* Logo Municipio escudo (placeholder) */
.logo-municipio{display:flex;align-items:center;gap:10px;}
.logo-municipio-shield{width:46px;height:54px;background:linear-gradient(180deg,#C8202C 0%,#8B1018 100%);border-radius:6px 6px 18px 18px;position:relative;display:flex;align-items:center;justify-content:center;color:#fff;font-size:9px;font-weight:900;text-align:center;line-height:1;padding:6px;box-shadow:0 2px 4px rgba(200,32,44,.3);}
.logo-municipio-shield::after{content:'';position:absolute;top:4px;left:4px;right:4px;bottom:4px;border:1px solid rgba(255,255,255,.4);border-radius:4px 4px 14px 14px;}
.logo-municipio-text{display:flex;flex-direction:column;line-height:1.1;}
.logo-municipio-t1{font-size:10px;font-weight:800;color:var(--navy);letter-spacing:.04em;}
.logo-municipio-t2{font-size:14px;font-weight:900;color:var(--navy);letter-spacing:.02em;}

/* Logo Fundación Grupo Social (placeholder) */
.logo-fgs{display:flex;align-items:center;gap:10px;}
.logo-fgs-hex{width:42px;height:48px;background:#1B6FA5;clip-path:polygon(50% 0%,100% 25%,100% 75%,50% 100%,0% 75%,0% 25%);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:900;font-size:18px;}
.logo-fgs-text{display:flex;flex-direction:column;line-height:1.1;}
.logo-fgs-t1{font-size:11px;font-weight:800;color:#1B6FA5;letter-spacing:.04em;}
.logo-fgs-t2{font-size:15px;font-weight:900;color:#1B6FA5;letter-spacing:.01em;}

/* Título */
.main-title{text-align:center;padding:28px 24px 24px;background:#fff;}
.main-title h1{font-size:34px;font-weight:700;color:var(--navy);letter-spacing:-.02em;margin-bottom:6px;}
.main-title p{font-size:14px;color:var(--gris);font-weight:500;}

/* ═══ HERO PLAYA REDISEÑADO ═══ */
.hero{position:relative;overflow:hidden;padding:56px 24px 0;background:linear-gradient(180deg,#FFF8EC 0%,#FDF5EE 35%,#E8F1FF 65%,#CDE7FA 100%);}
.hero-content{position:relative;z-index:3;max-width:900px;margin:0 auto;text-align:center;padding-bottom:80px;}
.hero-h1{font-size:36px;font-weight:800;color:var(--navy);line-height:1.2;letter-spacing:-.02em;max-width:820px;margin:0 auto 36px;}
.hero-h1 em{color:var(--caribe);font-style:normal;}
.hero-cta{display:flex;gap:14px;justify-content:center;flex-wrap:wrap;}
.btn-cta{display:inline-flex;align-items:center;gap:10px;padding:14px 32px;border-radius:10px;font-size:15px;font-weight:700;border:none;cursor:pointer;text-decoration:none;color:#fff;box-shadow:0 4px 14px rgba(0,0,0,.12);transition:transform .15s,box-shadow .15s;}
.btn-cta:hover{transform:translateY(-2px);box-shadow:0 6px 20px rgba(0,0,0,.18);color:#fff;}
.btn-cta-green{background:var(--palma);}
.btn-cta-green:hover{background:#15803D;}
.btn-cta-blue{background:var(--caribe);}
.btn-cta-blue:hover{background:var(--caribe-d);}
.btn-cta-icon{width:22px;height:22px;background:rgba(255,255,255,.25);border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:13px;}

/* Sol decorativo en la esquina superior derecha */
.hero-sun{position:absolute;top:-40px;right:-40px;width:240px;height:240px;background:radial-gradient(circle,rgba(245,158,11,.35) 0%,rgba(245,158,11,.12) 40%,transparent 70%);border-radius:50%;pointer-events:none;z-index:1;}

/* Mar de fondo: 3 capas con curvas suaves y profesionales */
.hero-sea{position:absolute;bottom:0;left:0;right:0;height:160px;pointer-events:none;z-index:2;}

/* KPI strip */
.kpi-strip{background:#fff;border-bottom:1px solid var(--border);padding:18px 24px;}
.kpi-inner{max-width:1100px;margin:0 auto;display:flex;align-items:center;justify-content:space-around;gap:16px;flex-wrap:wrap;}
.kpi-item{text-align:center;flex:1;min-width:140px;}
.kpi-num{font-size:28px;font-weight:800;line-height:1;margin-bottom:4px;}
.kpi-num.c1{color:var(--navy);}.kpi-num.c2{color:var(--palma);}.kpi-num.c3{color:var(--arena-d);}.kpi-num.c4{color:var(--palma);}
.kpi-lbl{font-size:12px;color:var(--gris);font-weight:600;}

/* Content */
.content{max-width:1200px;margin:0 auto;padding:32px 24px;display:grid;grid-template-columns:1fr 320px;gap:28px;align-items:start;}
@media (max-width: 980px){.content{grid-template-columns:1fr;}}

/* Acciones */
.acciones-grid{display:grid;grid-template-columns:1fr 1fr 1fr;gap:14px;margin-bottom:32px;}
@media (max-width: 760px){.acciones-grid{grid-template-columns:1fr;}}
.accion{background:#fff;border:1px solid var(--border);border-radius:14px;padding:22px;display:flex;flex-direction:column;gap:12px;text-decoration:none;transition:transform .15s,box-shadow .15s;min-height:220px;}
.accion:hover{transform:translateY(-3px);box-shadow:0 8px 24px rgba(11,37,64,.1);}
.accion-icon{width:54px;height:54px;border-radius:12px;display:flex;align-items:center;justify-content:center;}
.accion-icon svg{width:28px;height:28px;}
.accion-voz .accion-icon{background:var(--palma-l);}.accion-voz .accion-icon svg{stroke:var(--palma);}
.accion-inst .accion-icon{background:#E0F2FE;}.accion-inst .accion-icon svg{stroke:var(--caribe);}
.accion-avc .accion-icon{background:var(--sol-l);}.accion-avc .accion-icon svg{stroke:var(--sol);}
.accion-title{font-size:18px;font-weight:800;color:var(--navy);line-height:1.2;}
.accion-desc{font-size:12px;color:var(--gris);line-height:1.55;flex:1;}
.accion-btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:11px 16px;border-radius:8px;color:#fff;font-weight:700;font-size:13px;border:none;text-align:center;}
.accion-voz .accion-btn{background:var(--palma);}
.accion-inst .accion-btn{background:var(--caribe);}
.accion-avc .accion-btn{background:var(--sol);}

/* Novedades */
.section-title{font-size:18px;font-weight:800;color:var(--navy);text-align:center;margin-bottom:18px;position:relative;}
.section-title::after{content:'';display:block;width:60px;height:3px;background:var(--caribe);border-radius:2px;margin:8px auto 0;}
.news-card{background:#fff;border:1px solid var(--border);border-radius:12px;padding:18px;display:flex;gap:14px;align-items:flex-start;}
.news-icon{width:44px;height:44px;background:linear-gradient(135deg,#E0F2FE,#B3E5FC);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;}
.news-title{font-size:14px;font-weight:700;color:var(--navy);line-height:1.35;margin-bottom:4px;}
.news-meta{font-size:11px;color:var(--gris-l);}

/* Sidebar */
.sb-title{font-size:18px;font-weight:800;color:var(--navy);margin-bottom:14px;}
.sb-card{background:#fff;border:1px solid var(--border);border-radius:14px;overflow:hidden;}
.sb-img{height:180px;background:linear-gradient(135deg,#FBBF77,#F59E0B 60%,#16A34A);display:flex;align-items:center;justify-content:center;font-size:48px;position:relative;}
.sb-img::after{content:'';position:absolute;inset:0;background:linear-gradient(180deg,transparent 50%,rgba(0,0,0,.15) 100%);}
.sb-body{padding:16px 18px;}
.sb-school{font-size:16px;font-weight:800;color:var(--navy);margin-bottom:4px;}
.sb-post{font-size:13px;color:var(--gris);margin-bottom:14px;line-height:1.4;}
.sb-link{font-size:13px;color:var(--caribe);font-weight:700;display:inline-flex;align-items:center;gap:6px;}
.sb-link:hover{color:var(--caribe-d);}

/* Footer */
.footer{background:var(--navy);color:rgba(255,255,255,.7);padding:48px 24px 24px;margin-top:40px;}
.footer-inner{max-width:1200px;margin:0 auto;}
.footer-cols{display:grid;grid-template-columns:1.5fr 1fr 1fr;gap:32px;margin-bottom:32px;}
@media (max-width: 760px){.footer-cols{grid-template-columns:1fr;gap:24px;}}
.footer-brand{display:flex;align-items:center;gap:14px;margin-bottom:14px;}
.footer-brand img{height:44px;width:auto;}
.footer-brand-text strong{color:#fff;font-weight:800;font-size:16px;display:block;}
.footer-brand-text small{font-size:12px;color:var(--sol);font-weight:700;letter-spacing:.04em;}
.footer p.footer-desc{font-size:13px;line-height:1.6;color:rgba(255,255,255,.6);}
.footer h4{color:#fff;font-weight:800;font-size:13px;text-transform:uppercase;letter-spacing:.08em;margin-bottom:14px;}
.footer ul{list-style:none;padding:0;margin:0;}
.footer ul li{margin-bottom:8px;font-size:13px;color:rgba(255,255,255,.6);}
.footer ul a{color:rgba(255,255,255,.6);font-size:13px;text-decoration:none;}
.footer ul a:hover{color:var(--sol);}
.footer-allies{display:flex;align-items:center;gap:18px;flex-wrap:wrap;padding-top:24px;border-top:1px solid rgba(255,255,255,.1);margin-bottom:20px;}
.footer-allies img{height:32px;width:auto;background:#fff;padding:4px 8px;border-radius:6px;}
.footer-bottom{border-top:1px solid rgba(255,255,255,.1);padding-top:20px;display:flex;justify-content:space-between;align-items:center;font-size:11px;color:rgba(255,255,255,.4);flex-wrap:wrap;gap:8px;}
.footer-bottom-brand{display:flex;align-items:center;gap:8px;}
.footer-bottom-brand img{height:20px;width:auto;opacity:.85;}

@media (max-width: 640px){
  .main-title h1{font-size:24px;}
  .hero-h1{font-size:24px;}
  .btn-cta{padding:11px 22px;font-size:13px;}
  .allies-inner{gap:20px;}
  .pem-tree img{height:54px;}
}
</style>
</head>
<body>

<div class="topbar">Municipio de <b>Necoclí</b> · Urabá Antioqueño · Colombia</div>

{{-- HEADER: ÁRBOL PEM + 3 ALIADOS --}}
<div class="allies-bar">
  <div class="allies-inner">

    {{-- Árbol PEM (identidad propia) --}}
    <a href="{{ route('quienes-somos') }}" class="ally-logo pem-tree" aria-label="PEM Necoclí">
      <img src="{{ asset('images/logo-pem-simbolo.svg') }}" alt="PEM Necoclí">
    </a>

    <div class="ally-sep"></div>

    {{-- Aliados reales --}}
    <img src="{{ asset('images/logonecsf.png') }}" alt="Necoclí tú perteneces aquí" style="height:100px;width:auto;">
    <img src="{{ asset('images/logoescnecf.png') }}" alt="Municipio de Necoclí" style="height:90px;width:auto;">
    <img src="{{ asset('images/logo_fgs.svg') }}" alt="Fundación Grupo Social" style="height:30px;width:auto;">
  </div>
</div>

{{-- TÍTULO --}}
<div class="main-title">
  <h1>Mesa Municipal de Educación Necoclí</h1>
  <p>Plan Educativo Municipal 2025–2035</p>
</div>

{{-- HERO con playa rediseñada --}}
<div class="hero">
  {{-- Sol decorativo arriba a la derecha --}}
  <div class="hero-sun"></div>

  {{-- Contenido del hero --}}
  <div class="hero-content">
    <h2 class="hero-h1">Construimos juntos el <em>futuro educativo</em> del territorio</h2>
    <div class="hero-cta">
      <a href="#nuestra-voz" class="btn-cta btn-cta-green">
        <span class="btn-cta-icon">🎙️</span> Participar ahora
      </a>
      <a href="{{ url('/nuestras-huellas') }}" class="btn-cta btn-cta-blue">
        <span class="btn-cta-icon">📋</span> Ver proyectos
      </a>
      <a href="{{ route('dashboard-pem') }}" class="btn-cta" style="background:var(--sol);color:var(--navy);">
        <span class="btn-cta-icon">📊</span> Dashboard PEM
      </a>
    </div>
  </div>

  {{-- Mar al fondo: 3 olas suaves con horizonte limpio --}}
  <svg class="hero-sea" viewBox="0 0 1440 160" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
    {{-- Línea de horizonte (mar lejos, casi recto) --}}
    <path d="M0,40 Q360,28 720,40 T1440,40 L1440,160 L0,160 Z" fill="#BAE6FD" opacity=".55"/>
    {{-- Ola media --}}
    <path d="M0,75 Q360,55 720,75 T1440,75 L1440,160 L0,160 Z" fill="#7DD3FC" opacity=".7"/>
    {{-- Ola cercana --}}
    <path d="M0,115 Q360,95 720,115 T1440,115 L1440,160 L0,160 Z" fill="#38BDF8" opacity=".85"/>
  </svg>
</div>

{{-- KPIs --}}
<div class="kpi-strip">
  <div class="kpi-inner">
    <div class="kpi-item">
      <div class="kpi-num c1">{{ $stats['voces'] ?? '1,247' }}</div>
      <div class="kpi-lbl">Voces recogidas</div>
    </div>
    <div class="kpi-item">
      <div class="kpi-num c2">{{ $stats['veredas'] ?? 23 }}</div>
      <div class="kpi-lbl">Veredas participantes</div>
    </div>
    <div class="kpi-item">
      <div class="kpi-num c3">{{ $stats['metas'] ?? 8 }}</div>
      <div class="kpi-lbl">Metas activas</div>
    </div>
    <div class="kpi-item">
      <div class="kpi-num c4">Jun 12</div>
      <div class="kpi-lbl">Próxima sesión</div>
    </div>
  </div>
</div>

{{-- CONTENIDO --}}
<div class="content">
  <div>
    <div class="acciones-grid">
      <a href="#nuestra-voz" class="accion accion-voz">
        <div class="accion-icon">
          <svg fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
        </div>
        <div class="accion-title">Nuestra Voz</div>
        <div class="accion-desc">Cuéntanos cómo está la educación en tu vereda. Tu voz construye el PEM.</div>
        <span class="accion-btn">Participar →</span>
      </a>

      <a href="#mi-institucion" class="accion accion-inst">
        <div class="accion-icon">
          <svg fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 21V10l8-7 8 7v11M9 21v-6h6v6"/></svg>
        </div>
        <div class="accion-title">Nuestra Institución</div>
        <div class="accion-desc">Espacio institucional: proyectos, acuerdos y PDF firmado.</div>
        <span class="accion-btn">Registrar →</span>
      </a>

      <a href="{{ url('/nuestras-huellas') }}" class="accion accion-avc">
        <div class="accion-icon">
          <svg fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/></svg>
        </div>
        <div class="accion-title">Nuestros Avances</div>
        <div class="accion-desc">Huellas con evidencia: docentes, rectores y comunidad.</div>
        <span class="accion-btn">Subir avance →</span>
      </a>
    </div>

    <h3 class="section-title">Novedades del PEM</h3>
    @forelse($news as $item)
  <div class="news-card">
    <div class="news-icon">{{ $item->icon }}</div>
    <div class="news-body">
      @if($item->link)
        <a href="{{ $item->link }}" target="_blank" class="news-title">{{ $item->title }}</a>
      @else
        <div class="news-title">{{ $item->title }}</div>
      @endif
      <div class="news-meta">{{ $item->meta }}</div>
    </div>
  </div>
@empty
  <div class="news-card">
    <div class="news-icon">📰</div>
    <div class="news-body">
      <div class="news-title">Próximamente nuevas novedades del PEM</div>
      <div class="news-meta">Mantente atento</div>
    </div>
  </div>
@endforelse

  <div>
    <div class="sb-title">Nuestros Colegios</div>
    <div class="sb-card">
      <div class="sb-img">🏫</div>
      <div class="sb-body">
        <div class="sb-school">IE Rural El Pescador</div>
        <div class="sb-post">Nuevo laboratorio en marcha!</div>
        <a href="{{ route('colegios.index') }}" class="sb-link">Ver todos los colegios →</a>
      </div>
    </div>
  </div>
</div>

{{-- FOOTER --}}
<footer class="footer">
  <div class="footer-inner">
    <div class="footer-cols">
      <div>
        <div class="footer-brand">
          <img src="{{ asset('images/logo-pem-simbolo.svg') }}" alt="PEM Necoclí">
          <div class="footer-brand-text">
            <strong>PEM Necoclí</strong>
            <small>MESA MUNICIPAL DE EDUCACIÓN</small>
          </div>
        </div>
        <p class="footer-desc">El Plan Educativo Municipal es la apuesta colectiva por una educación pertinente, equitativa y con identidad territorial para Necoclí.</p>
      </div>
      <div>
        <h4>Explorar</h4>
        <ul>
          <li><a href="{{ url('/nuestras-huellas') }}">Nuestras huellas</a></li>
          <li><a href="{{ route('quienes-somos') }}">Acerca del PEM</a></li>
          <li><a href="{{ route('colegios.index') }}">Instituciones</a></li>
          <li><a href="{{ route('dashboard-pem') }}">Dashboard PEM</a></li>
        </ul>
      </div>
      <div>
        <h4>Contacto</h4>
        <ul>
          <li>Necoclí, Antioquia</li>
          <li>contacto@pem-necocli.co</li>
          <li>PEM Necoclí</li>
        </ul>
      </div>
    </div>

    <div class="footer-allies">
      <img src="{{ asset('images/logonecsf.png') }}" alt="Necoclí tú perteneces aquí">
      <img src="{{ asset('images/logoescnecf.png') }}" alt="Municipio de Necoclí">
      <img src="{{ asset('images/logo_fgs.svg') }}" alt="Fundación Grupo Social">
    </div>

    <div class="footer-bottom">
      <span class="footer-bottom-brand">
        <img src="{{ asset('images/logo-pem-simbolo.svg') }}" alt="PEM">
        © {{ date('Y') }} PEM Necoclí. Construido con cariño en el Urabá.
      </span>
      <span>v0.1 — beta</span>
    </div>
  </div>
</footer>

</body>
</html>
