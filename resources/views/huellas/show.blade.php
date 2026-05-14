<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} — PEM Necoclí</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Nunito+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root{--sol:#F5A820;--sol-l:#FFF3D6;--sol-d:#C8840A;--caribe:#0891B2;--caribe-d:#076F90;--turquesa:#05C2D8;--tur-l:#E0F9FC;--palma:#2D8A4E;--palma-l:#EFF8F2;--lila:#8B52B0;--lila-l:#F3EEF8;--navy:#0B2540;--texto:#1A3344;--gris:#5A6B82;--gris-l:#94A3B8;--border:#E2EBF4;--bg:#F5F4EF;--white:#FFFFFF;--radius:12px;--shadow:0 2px 12px rgba(11,37,64,.08);}
        *{box-sizing:border-box;margin:0;padding:0;}
        body{font-family:'Nunito Sans',sans-serif;background:var(--bg);color:var(--texto);}
        h1,h2,h3{font-family:'Nunito',sans-serif;}
        .nav{position:fixed;top:0;left:0;right:0;z-index:100;background:rgba(11,37,64,0.97);backdrop-filter:blur(12px);padding:12px 24px;display:flex;align-items:center;justify-content:space-between;}
        .nav-logo{color:#fff;font-weight:800;font-size:15px;font-family:'Nunito',sans-serif;text-decoration:none;}
        .nav-back{color:rgba(255,255,255,0.7);text-decoration:none;font-size:13px;font-weight:600;padding:6px 14px;border-radius:8px;transition:all .2s;display:flex;align-items:center;gap:6px;}
        .nav-back:hover{background:rgba(255,255,255,0.1);color:#fff;}
        .container{max-width:800px;margin:0 auto;padding:90px 16px 60px;}
        .card{background:var(--white);border-radius:16px;border:1px solid var(--border);box-shadow:var(--shadow);overflow:hidden;}
        .card-header{padding:24px;border-bottom:1px solid var(--border);}
        .meta{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:12px;}
        .badge{display:inline-flex;align-items:center;gap:4px;padding:4px 12px;border-radius:20px;font-size:11px;font-weight:800;font-family:'Nunito',sans-serif;}
        .badge-platform{background:var(--lila-l);color:var(--lila);}
        .badge-platform.youtube{background:#fef0ee;color:#c0392b;}
        .badge-line{background:var(--tur-l);color:var(--caribe-d);}
        .badge-featured{background:var(--sol-l);color:var(--sol-d);}
        h1{font-size:clamp(1.3rem,3vw,1.8rem);font-weight:900;color:var(--navy);margin-bottom:8px;line-height:1.3;}
        .desc{font-size:14px;color:var(--gris);line-height:1.7;}
        .embed-wrap{padding:24px;background:var(--bg);border-bottom:1px solid var(--border);}
        .embed-wrap iframe{width:100%;border-radius:12px;border:none;}
        .thumb{width:100%;max-height:400px;object-fit:cover;}
        .card-footer{padding:20px 24px;display:flex;flex-wrap:wrap;gap:12px;align-items:center;justify-content:space-between;}
        .btn{display:inline-flex;align-items:center;gap:8px;padding:10px 20px;border-radius:var(--radius);font-size:13px;font-weight:800;text-decoration:none;font-family:'Nunito',sans-serif;transition:all .2s;}
        .btn-primary{background:var(--caribe);color:#fff;}
        .btn-primary:hover{background:var(--caribe-d);}
        .btn-outline{background:var(--white);color:var(--gris);border:1px solid var(--border);}
        .btn-outline:hover{border-color:var(--caribe);color:var(--caribe);}
        .info{font-size:12px;color:var(--gris-l);}
    </style>
</head>
<body>

<nav class="nav">
    <a href="/" class="nav-logo">📚 PEM Necoclí</a>
    <a href="{{ route('huellas.index') }}" class="nav-back">
        <i class="fas fa-arrow-left"></i> Volver a Huellas
    </a>
</nav>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="meta">
                @if($post->featured)
                    <span class="badge badge-featured">⭐ Destacada</span>
                @endif
                <span class="badge badge-platform {{ $post->platform }}">
                    <i class="fab fa-{{ $post->platform }}"></i> {{ ucfirst($post->platform) }}
                </span>
                @if($post->strategicLine)
                    <span class="badge badge-line">{{ $post->strategicLine->nombre }}</span>
                @endif
            </div>
            <h1>{{ $post->title }}</h1>
            @if($post->description)
                <p class="desc">{{ $post->description }}</p>
            @endif
        </div>

        <div class="embed-wrap">
            @if($post->platform === 'youtube')
                @php
                    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $post->url, $matches);
                    $videoId = $matches[1] ?? null;
                @endphp
                @if($videoId)
                    <iframe height="400" src="https://www.youtube.com/embed/{{ $videoId }}" allowfullscreen></iframe>
                @else
                    <a href="{{ $post->url }}" target="_blank" class="btn btn-primary">
                        <i class="fab fa-youtube"></i> Ver en YouTube
                    </a>
                @endif
            @else
                @if($post->thumbnail_url)
                    <img src="{{ $post->thumbnail_url }}" class="thumb" alt="{{ $post->title }}">
                @endif
                <div style="margin-top:16px;">
                    <a href="{{ $post->url }}" target="_blank" class="btn btn-primary">
                        <i class="fab fa-facebook"></i> Ver en Facebook
                    </a>
                </div>
            @endif
        </div>

        <div class="card-footer">
            <div class="info">
                <i class="fas fa-user" style="margin-right:4px;"></i>{{ $post->submitter->name ?? 'PEM Necoclí' }}
                @if($post->approved_at)
                    • <i class="fas fa-calendar" style="margin-right:4px;"></i>{{ $post->approved_at->format('d M Y') }}
                @endif
            </div>
            <div style="display:flex;gap:8px;">
                <a href="{{ $post->url }}" target="_blank" class="btn btn-outline">
                    <i class="fas fa-external-link-alt"></i> Ver original
                </a>
                <a href="{{ route('huellas.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i> Más huellas
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>