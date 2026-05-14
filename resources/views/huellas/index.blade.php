<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestras Huellas — PEM Necoclí</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Nunito+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root{--sol:#F5A820;--sol-l:#FFF3D6;--sol-d:#C8840A;--caribe:#0891B2;--caribe-d:#076F90;--turquesa:#05C2D8;--tur-l:#E0F9FC;--palma:#2D8A4E;--palma-l:#EFF8F2;--lila:#8B52B0;--lila-l:#F3EEF8;--navy:#0B2540;--texto:#1A3344;--gris:#5A6B82;--gris-l:#94A3B8;--border:#E2EBF4;--bg:#F5F4EF;--white:#FFFFFF;--radius:12px;--shadow:0 2px 12px rgba(11,37,64,.08);}
        *{box-sizing:border-box;margin:0;padding:0;}
        body{font-family:'Nunito Sans',sans-serif;background:var(--bg);color:var(--texto);}
        h1,h2,h3,h4{font-family:'Nunito',sans-serif;}

        /* NAV */
        .nav{position:fixed;top:0;left:0;right:0;z-index:100;background:rgba(11,37,64,0.97);backdrop-filter:blur(12px);padding:12px 24px;display:flex;align-items:center;justify-content:space-between;}
        .nav-logo{color:#fff;font-weight:800;font-size:15px;font-family:'Nunito',sans-serif;text-decoration:none;display:flex;align-items:center;gap:8px;}
        .nav-actions{display:flex;gap:10px;}
        .nav-link{color:rgba(255,255,255,0.7);text-decoration:none;font-size:13px;font-weight:600;padding:6px 14px;border-radius:8px;transition:all .2s;}
        .nav-link:hover{background:rgba(255,255,255,0.1);color:#fff;}
        .nav-link.primary{background:var(--sol);color:var(--navy);}

        /* HERO */
        .hero{background:linear-gradient(135deg,var(--navy) 0%,var(--caribe-d) 50%,var(--turquesa) 100%);padding:100px 24px 60px;text-align:center;}
        .hero h1{color:#fff;font-size:clamp(1.8rem,4vw,2.8rem);font-weight:900;margin-bottom:8px;}
        .hero p{color:var(--tur-l);font-size:15px;margin-bottom:24px;}
        .hero-stats{display:flex;justify-content:center;gap:32px;flex-wrap:wrap;}
        .hero-stat{text-align:center;}
        .hero-stat-num{font-size:2rem;font-weight:900;color:#fff;font-family:'Nunito',sans-serif;}
        .hero-stat-label{font-size:11px;color:rgba(255,255,255,0.6);text-transform:uppercase;letter-spacing:1px;}

        /* FILTERS */
        .filters{max-width:1100px;margin:0 auto;padding:24px 16px 0;}
        .filter-chips{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:8px;}
        .chip{padding:7px 16px;border-radius:20px;font-size:12px;font-weight:700;cursor:pointer;border:2px solid var(--border);background:var(--white);color:var(--gris);text-decoration:none;transition:all .2s;font-family:'Nunito',sans-serif;}
        .chip:hover{border-color:var(--caribe);color:var(--caribe);}
        .chip.active{background:var(--caribe);color:#fff;border-color:var(--caribe);}
        .chip.yt{background:var(--coral-l);color:#c0392b;border-color:#f5c0ba;}
        .chip.yt:hover,.chip.yt.active{background:#c0392b;color:#fff;border-color:#c0392b;}
        .chip.fb{background:var(--lila-l);color:var(--lila);border-color:#b88dd4;}
        .chip.fb:hover,.chip.fb.active{background:var(--lila);color:#fff;border-color:var(--lila);}

        /* GRID */
        .main{max-width:1100px;margin:0 auto;padding:24px 16px 80px;}
        .section-title{font-size:13px;font-weight:800;color:var(--gris);text-transform:uppercase;letter-spacing:1px;margin-bottom:16px;display:flex;align-items:center;gap:8px;}
        .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:16px;margin-bottom:32px;}

        /* CARD */
        .card{background:var(--white);border-radius:16px;overflow:hidden;border:1px solid var(--border);box-shadow:var(--shadow);transition:all .3s;text-decoration:none;color:inherit;display:block;}
        .card:hover{transform:translateY(-4px);box-shadow:0 8px 30px rgba(11,37,64,0.12);}
        .card-thumb{height:180px;background:var(--bg);position:relative;overflow:hidden;}
        .card-thumb img{width:100%;height:100%;object-fit:cover;}
        .card-thumb-placeholder{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:48px;}
        .platform-badge{position:absolute;top:10px;right:10px;padding:4px 10px;border-radius:20px;font-size:10px;font-weight:800;font-family:'Nunito',sans-serif;}
        .platform-badge.youtube{background:#c0392b;color:#fff;}
        .platform-badge.facebook{background:var(--lila);color:#fff;}
        .featured-badge{position:absolute;top:10px;left:10px;background:var(--sol);color:var(--navy);padding:4px 10px;border-radius:20px;font-size:10px;font-weight:800;font-family:'Nunito',sans-serif;}
        .card-body{padding:16px;}
        .card-line{display:inline-block;padding:3px 10px;border-radius:20px;font-size:10px;font-weight:700;margin-bottom:8px;font-family:'Nunito',sans-serif;}
        .card-title{font-size:14px;font-weight:800;color:var(--texto);margin-bottom:4px;line-height:1.4;}
        .card-desc{font-size:12px;color:var(--gris);line-height:1.5;}

        /* EMPTY */
        .empty{text-align:center;padding:60px 24px;color:var(--gris);}
        .empty i{font-size:48px;margin-bottom:16px;color:var(--border);}

        /* PAGINATION */
        .pagination{display:flex;justify-content:center;gap:8px;margin-top:32px;}
        .pagination a,.pagination span{padding:8px 14px;border-radius:8px;font-size:13px;font-weight:700;border:1px solid var(--border);background:var(--white);color:var(--gris);text-decoration:none;font-family:'Nunito',sans-serif;}
        .pagination .active span{background:var(--caribe);color:#fff;border-color:var(--caribe);}
    </style>
</head>
<body>

<nav class="nav">
    <a href="/" class="nav-logo">📚 PEM Necoclí</a>
    <div class="nav-actions">
        @auth
            <a href="{{ route('dashboard') }}" class="nav-link">Panel</a>
        @else
            <a href="{{ route('login') }}" class="nav-link primary">Ingresar</a>
        @endauth
    </div>
</nav>

<div class="hero">
    <h1>🌊 Nuestras Huellas</h1>
    <p>Las voces y logros del territorio educativo de Necoclí</p>
    <div class="hero-stats">
        <div class="hero-stat">
            <div class="hero-stat-num">{{ $stats['total'] }}</div>
            <div class="hero-stat-label">Huellas publicadas</div>
        </div>
        <div class="hero-stat">
            <div class="hero-stat-num">{{ $stats['featured'] }}</div>
            <div class="hero-stat-label">Destacadas</div>
        </div>
        <div class="hero-stat">
            <div class="hero-stat-num">4</div>
            <div class="hero-stat-label">Líneas estratégicas</div>
        </div>
    </div>
</div>

<div class="filters">
    <div class="filter-chips">
        <a href="{{ route('huellas.index') }}" class="chip {{ !request('line') && !request('platform') ? 'active' : '' }}">
            Todas
        </a>
        @foreach($lines as $line)
            <a href="{{ route('huellas.index', ['line' => $line->id]) }}" class="chip {{ request('line') == $line->id ? 'active' : '' }}">
                {{ $line->nombre }}
            </a>
        @endforeach
    </div>
    <div class="filter-chips">
        <a href="{{ route('huellas.index', array_merge(request()->query(), ['platform' => 'youtube'])) }}" class="chip yt {{ request('platform') == 'youtube' ? 'active' : '' }}">
            <i class="fab fa-youtube"></i> YouTube
        </a>
        <a href="{{ route('huellas.index', array_merge(request()->query(), ['platform' => 'facebook'])) }}" class="chip fb {{ request('platform') == 'facebook' ? 'active' : '' }}">
            <i class="fab fa-facebook"></i> Facebook
        </a>
    </div>
</div>

<main class="main">

    @if($featured->count() > 0 && !request('line') && !request('platform'))
        <div class="section-title"><i class="fas fa-star" style="color:var(--sol);"></i> Destacadas</div>
        <div class="grid">
            @foreach($featured as $post)
                <a href="{{ route('huellas.show', $post) }}" class="card">
                    <div class="card-thumb">
                        @if($post->thumbnail_url)
                            <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}">
                        @else
                            <div class="card-thumb-placeholder">
                                {{ $post->platform === 'youtube' ? '▶️' : '📘' }}
                            </div>
                        @endif
                        <span class="featured-badge">⭐ Destacada</span>
                        <span class="platform-badge {{ $post->platform }}">{{ ucfirst($post->platform) }}</span>
                    </div>
                    <div class="card-body">
                        @if($post->strategicLine)
                            <span class="card-line" style="background:var(--sol-l);color:var(--sol-d);">{{ $post->strategicLine->nombre }}</span>
                        @endif
                        <div class="card-title">{{ $post->title }}</div>
                        @if($post->description)
                            <div class="card-desc">{{ Str::limit($post->description, 80) }}</div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    @endif

    <div class="section-title"><i class="fas fa-globe"></i> Todas las huellas</div>

    @if($posts->count() > 0)
        <div class="grid">
            @foreach($posts as $post)
                <a href="{{ route('huellas.show', $post) }}" class="card">
                    <div class="card-thumb">
                        @if($post->thumbnail_url)
                            <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}">
                        @else
                            <div class="card-thumb-placeholder">
                                {{ $post->platform === 'youtube' ? '▶️' : '📘' }}
                            </div>
                        @endif
                        <span class="platform-badge {{ $post->platform }}">{{ ucfirst($post->platform) }}</span>
                    </div>
                    <div class="card-body">
                        @if($post->strategicLine)
                            <span class="card-line" style="background:var(--tur-l);color:var(--caribe-d);">{{ $post->strategicLine->nombre }}</span>
                        @endif
                        <div class="card-title">{{ $post->title }}</div>
                        @if($post->description)
                            <div class="card-desc">{{ Str::limit($post->description, 80) }}</div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
        <div class="pagination">{{ $posts->links() }}</div>
    @else
        <div class="empty">
            <i class="fas fa-inbox"></i>
            <p>No hay huellas en esta categoría aún.</p>
        </div>
    @endif

</main>

</body>
</html>