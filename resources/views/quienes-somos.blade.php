<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEM Necoclí 2025–2035</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Nunito+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* ═══════════════════════════════════════════
           PEM NECOCLÍ — DESIGN SYSTEM v4
           "Tropical institucional": caribeño, cálido
           ═══════════════════════════════════════════ */
        :root{
            --sol:      #F5A820;
            --sol-l:    #FFF3D6;
            --sol-d:    #C8840A;
            --caribe:   #0891B2;
            --caribe-d: #076F90;
            --turquesa: #05C2D8;
            --tur-l:    #E0F9FC;
            --palma:    #2D8A4E;
            --palma-l:  #EFF8F2;
            --arena:    #C8904A;
            --arena-l:  #FBF5E8;
            --coral:    #E8756A;
            --coral-l:  #FEF0EE;
            --lila:     #8B52B0;
            --lila-l:   #F3EEF8;
            --navy:     #0B2540;
            --texto:    #1A3344;
            --gris:     #5A6B82;
            --gris-l:   #94A3B8;
            --border:   #E2EBF4;
            --bg:       #F5F4EF;
            --white:    #FFFFFF;
            --radius:   12px;
            --radius-s: 8px;
            --shadow:   0 2px 12px rgba(11,37,64,.08);
            --shadow-m: 0 4px 20px rgba(11,37,64,.12);
        }
        *{font-family:'Nunito Sans',sans-serif;scroll-behavior:smooth;box-sizing:border-box;}
        body{background:var(--bg);margin:0;padding:0;color:var(--texto);}
        h1,h2,h3,h4,h5,h6{font-family:'Nunito',sans-serif;}
        
        /* ── NAV ── */
        .nav-fixed{position:fixed;top:0;left:0;right:0;z-index:1000;background:rgba(11,37,64,0.97);backdrop-filter:blur(12px);box-shadow:0 2px 20px rgba(0,0,0,0.15);transition:all .3s;}
        .nav-inner{max-width:1200px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;padding:10px 16px;}
        .nav-logo{color:#fff;font-weight:800;font-size:15px;display:flex;align-items:center;gap:8px;font-family:'Nunito',sans-serif;}
        .nav-actions{display:flex;align-items:center;gap:8px;}
        .nav-btn{background:none;border:none;color:var(--tur-l);cursor:pointer;font-size:18px;padding:8px;border-radius:8px;transition:all .2s;}
        .nav-btn:hover{background:rgba(255,255,255,0.1);color:#fff;}
        .nav-badge{display:none;background:rgba(5,194,216,0.2);color:var(--turquesa);padding:4px 12px;border-radius:20px;font-size:11px;font-weight:700;font-family:'Nunito',sans-serif;}
        @media(min-width:640px){.nav-badge{display:inline-flex;}}

        /* ── SIDEBAR DRAWER ── */
        .sidebar-overlay{position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:1001;opacity:0;pointer-events:none;transition:opacity .3s;}
        .sidebar-overlay.open{opacity:1;pointer-events:all;}
        .sidebar{position:fixed;left:0;top:0;bottom:0;width:310px;max-width:85vw;background:linear-gradient(180deg,var(--navy) 0%,#0D3560 100%);z-index:1002;transform:translateX(-100%);transition:transform .35s cubic-bezier(.4,0,.2,1);overflow-y:auto;display:flex;flex-direction:column;}
        .sidebar.open{transform:translateX(0);}
        .sidebar-head{padding:20px;border-bottom:1px solid rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:space-between;}
        .sidebar-head h3{color:#fff;font-size:14px;font-weight:800;margin:0;font-family:'Nunito',sans-serif;}
        .sidebar-close{background:none;border:none;color:var(--turquesa);font-size:20px;cursor:pointer;padding:4px;}
        .sidebar-nav{flex:1;padding:8px 0;overflow-y:auto;}
        .sidebar-nav a{display:flex;align-items:center;gap:10px;padding:11px 20px;color:rgba(255,255,255,0.65);text-decoration:none;font-size:13px;font-weight:600;transition:all .2s;border-left:3px solid transparent;font-family:'Nunito',sans-serif;}
        .sidebar-nav a:hover,.sidebar-nav a.active{background:rgba(255,255,255,0.08);color:#fff;border-left-color:var(--turquesa);}
        .sidebar-nav a i{width:20px;text-align:center;font-size:14px;}
        .sidebar-nav .nav-divider{padding:12px 20px 6px;color:rgba(255,255,255,0.3);font-size:10px;font-weight:800;text-transform:uppercase;letter-spacing:1.5px;font-family:'Nunito',sans-serif;}
        .sidebar-footer{padding:16px 20px;border-top:1px solid rgba(255,255,255,0.1);text-align:center;}
        .sidebar-footer p{color:var(--gris);font-size:10px;margin:0;line-height:1.5;}

        /* ── HERO ── */
        .hero{background:linear-gradient(135deg,var(--navy) 0%,var(--caribe-d) 30%,var(--caribe) 70%,var(--turquesa) 100%);padding:100px 20px 50px;text-align:center;position:relative;overflow:hidden;}
        .hero::before{content:'';position:absolute;top:-50%;left:-50%;width:200%;height:200%;background:radial-gradient(ellipse at 30% 50%,rgba(255,255,255,0.06) 0%,transparent 70%);animation:heroPulse 10s ease-in-out infinite;}
        .hero::after{content:'';position:absolute;bottom:0;left:0;right:0;height:60px;background:linear-gradient(180deg,transparent,rgba(11,37,64,0.15));}
        @keyframes heroPulse{0%,100%{transform:scale(1) rotate(0deg);}50%{transform:scale(1.05) rotate(2deg);}}
        .hero *{position:relative;z-index:2;}
        .hero-tag{display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,0.15);backdrop-filter:blur(8px);color:#fff;padding:6px 16px;border-radius:20px;font-size:12px;font-weight:700;margin-bottom:16px;font-family:'Nunito',sans-serif;letter-spacing:.5px;}
        .hero h1{color:#fff;font-size:clamp(1.8rem,5vw,3.2rem);font-weight:900;line-height:1.1;margin:0 0 8px;font-family:'Nunito',sans-serif;}
        .hero .subtitle{color:var(--tur-l);font-size:clamp(1rem,2.5vw,1.5rem);font-weight:700;margin:0 0 4px;font-family:'Nunito',sans-serif;}
        .hero .tagline{color:rgba(255,255,255,0.75);font-size:clamp(0.85rem,1.8vw,1.1rem);margin:0 0 24px;}
        .hero-btns{display:flex;flex-wrap:wrap;justify-content:center;gap:10px;}
        .hero-btn{display:inline-flex;align-items:center;gap:8px;padding:12px 24px;border-radius:var(--radius);font-size:14px;font-weight:700;text-decoration:none;transition:all .2s;border:none;cursor:pointer;font-family:'Nunito',sans-serif;}
        .hero-btn.primary{background:var(--sol);color:var(--navy);}
        .hero-btn.primary:hover{background:var(--sol-d);transform:translateY(-2px);box-shadow:0 6px 20px rgba(245,168,32,0.4);}
        .hero-btn.secondary{background:rgba(255,255,255,0.15);color:#fff;backdrop-filter:blur(5px);border:1px solid rgba(255,255,255,0.25);}
        .hero-btn.secondary:hover{background:rgba(255,255,255,0.25);transform:translateY(-2px);}
        .hero-btn.highlight{background:rgba(45,138,78,0.25);color:#fff;backdrop-filter:blur(5px);border:2px solid rgba(45,138,78,0.5);}
        .hero-btn.highlight:hover{background:rgba(45,138,78,0.4);transform:translateY(-2px);}

        /* ── WAVE ── */
        .wave-bottom{display:block;width:100%;margin-top:-2px;}

        /* ── STATS ── */
        .stats-bar{max-width:1100px;margin:-30px auto 20px;padding:0 16px;position:relative;z-index:10;}
        .stats-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;}
        @media(min-width:640px){.stats-grid{grid-template-columns:repeat(4,1fr);}}
        .stat-card{background:var(--white);border-radius:14px;padding:16px;text-align:center;box-shadow:var(--shadow);transition:transform .3s;border:1px solid var(--border);}
        .stat-card:hover{transform:translateY(-3px);box-shadow:var(--shadow-m);}
        .stat-icon{width:40px;height:40px;border-radius:10px;display:flex;align-items:center;justify-content:center;margin:0 auto 8px;font-size:16px;color:#fff;}
        .stat-num{font-size:1.6rem;font-weight:900;background:linear-gradient(135deg,var(--caribe-d),var(--turquesa));-webkit-background-clip:text;-webkit-text-fill-color:transparent;font-family:'Nunito',sans-serif;}
        .stat-label{color:var(--gris);font-size:11px;font-weight:600;margin-top:2px;font-family:'Nunito',sans-serif;}

        /* ── MAIN ── */
        .main-content{max-width:1100px;margin:0 auto;padding:0 16px 80px;}

        /* ── SECTION CARDS ── */
        .sec-card{background:var(--white);border-radius:16px;box-shadow:var(--shadow);margin-bottom:16px;overflow:hidden;transition:all .3s;border:1px solid var(--border);}
        .sec-card:hover{box-shadow:var(--shadow-m);}
        .sec-head{padding:18px 20px;cursor:pointer;display:flex;align-items:center;gap:14px;user-select:none;transition:background .2s;}
        .sec-head:hover{background:var(--bg);}
        .sec-icon{width:42px;height:42px;border-radius:12px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px;flex-shrink:0;}
        .sec-info{flex:1;min-width:0;}
        .sec-info h2{font-size:15px;font-weight:800;color:var(--texto);margin:0;line-height:1.3;font-family:'Nunito',sans-serif;}
        .sec-info p{font-size:11px;color:var(--gris-l);margin:2px 0 0;line-height:1.3;}
        .sec-chevron{color:var(--gris-l);font-size:14px;transition:transform .3s;flex-shrink:0;}
        .sec-chevron.open{transform:rotate(180deg);}
        .sec-body{max-height:0;overflow:hidden;transition:max-height .5s cubic-bezier(.4,0,.2,1);}
        .sec-body.open{max-height:50000px;}
        .sec-inner{padding:0 20px 20px;}

        /* ── TABS ── */
        .tab-group{margin-bottom:16px;}
        .tabs{display:flex;flex-wrap:wrap;gap:6px;margin-bottom:16px;}
        .tab-btn{padding:8px 16px;border-radius:var(--radius-s);font-size:12px;font-weight:700;cursor:pointer;border:2px solid var(--border);background:var(--white);color:var(--gris);transition:all .2s;white-space:nowrap;font-family:'Nunito',sans-serif;}
        .tab-btn.active{background:var(--caribe);color:#fff;border-color:var(--caribe);}
        .tab-btn:hover:not(.active){border-color:var(--turquesa);color:var(--caribe);}
        .tab-panel{display:none;animation:fadeIn .3s ease;}
        .tab-panel.active{display:block;}
        @keyframes fadeIn{from{opacity:0;transform:translateY(6px);}to{opacity:1;transform:translateY(0);}}

        /* ── GRIDS ── */
        .grid-2{display:grid;grid-template-columns:1fr;gap:12px;}
        @media(min-width:640px){.grid-2{grid-template-columns:repeat(2,1fr);}}
        .grid-3{display:grid;grid-template-columns:1fr;gap:12px;}
        @media(min-width:640px){.grid-3{grid-template-columns:repeat(2,1fr);}}
        @media(min-width:900px){.grid-3{grid-template-columns:repeat(3,1fr);}}
        .grid-4{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;}
        @media(min-width:768px){.grid-4{grid-template-columns:repeat(4,1fr);}}
        .grid-6{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;}
        @media(min-width:640px){.grid-6{grid-template-columns:repeat(3,1fr);}}

        /* ── VALOR CARD ── */
        .valor-card{text-align:center;padding:20px 14px;background:var(--white);border-radius:14px;border:1px solid var(--border);transition:all .3s;cursor:default;}
        .valor-card:hover{transform:translateY(-4px);box-shadow:var(--shadow-m);border-color:var(--turquesa);}
        .valor-icon{width:50px;height:50px;border-radius:14px;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;font-size:20px;color:#fff;}
        .valor-card h4{font-size:13px;font-weight:800;color:var(--texto);margin:0 0 4px;font-family:'Nunito',sans-serif;}
        .valor-card p{font-size:11px;color:var(--gris);margin:0;line-height:1.4;}

        /* ── ENFOQUE CARD ── */
        .enfoque-card{background:var(--white);border-radius:14px;padding:20px;border-left:4px solid;box-shadow:var(--shadow);transition:all .3s;cursor:pointer;position:relative;overflow:hidden;}
        .enfoque-card:hover{transform:translateY(-2px);box-shadow:var(--shadow-m);}
        .enfoque-card .enfoque-expand{max-height:0;overflow:hidden;transition:max-height .4s ease;}
        .enfoque-card.expanded .enfoque-expand{max-height:500px;}
        .enfoque-toggle{font-size:10px;color:var(--gris-l);margin-top:6px;display:flex;align-items:center;gap:4px;}

        /* ── TIMELINE ── */
        .timeline-item{position:relative;padding-left:44px;padding-bottom:20px;}
        .timeline-item::before{content:'';position:absolute;left:17px;top:34px;bottom:0;width:2px;background:linear-gradient(180deg,var(--turquesa),var(--border));}
        .timeline-item:last-child::before{display:none;}
        .timeline-dot{position:absolute;left:8px;top:8px;width:22px;height:22px;border-radius:50%;border:3px solid var(--tur-l);display:flex;align-items:center;justify-content:center;font-size:10px;color:#fff;}
        .timeline-box{border-radius:var(--radius);padding:16px;transition:all .3s;cursor:pointer;}
        .timeline-box:hover{transform:translateX(4px);}
        .timeline-box .detail{max-height:0;overflow:hidden;transition:max-height .4s ease;}
        .timeline-box.expanded .detail{max-height:500px;}

        /* ── LÍNEAS ── */
        .linea-overview{border-radius:16px;padding:20px;cursor:pointer;transition:all .3s;border:2px solid transparent;position:relative;overflow:hidden;text-decoration:none;display:block;}
        .linea-overview:hover{transform:translateY(-3px);}
        .linea-overview .linea-arrow{position:absolute;right:16px;top:50%;transform:translateY(-50%);color:rgba(0,0,0,0.15);font-size:20px;transition:transform .2s;}
        .linea-overview:hover .linea-arrow{transform:translateY(-50%) translateX(4px);}
        .l1-bg{background:linear-gradient(135deg,var(--palma-l),#D8F0E0);border-color:#8FD4A8;}
        .l1-bg:hover{border-color:var(--palma);box-shadow:0 6px 25px rgba(45,138,78,0.15);}
        .l2-bg{background:linear-gradient(135deg,var(--tur-l),#C5F2F8);border-color:#7FD6E0;}
        .l2-bg:hover{border-color:var(--caribe);box-shadow:0 6px 25px rgba(8,145,178,0.15);}
        .l3-bg{background:linear-gradient(135deg,var(--sol-l),#FFE8A0);border-color:#F5D27A;}
        .l3-bg:hover{border-color:var(--sol);box-shadow:0 6px 25px rgba(245,168,32,0.15);}
        .l4-bg{background:linear-gradient(135deg,var(--lila-l),#E8D5F5);border-color:#B88DD4;}
        .l4-bg:hover{border-color:var(--lila);box-shadow:0 6px 25px rgba(139,82,176,0.15);}

        /* ── PROYECTOS ── */
        .proy-item{background:var(--bg);border:1px solid var(--border);border-radius:var(--radius);margin-bottom:8px;overflow:hidden;transition:all .2s;}
        .proy-item:hover{border-color:var(--turquesa);background:var(--tur-l);}
        .proy-head{padding:14px 16px;cursor:pointer;display:flex;align-items:center;justify-content:space-between;gap:10px;}
        .proy-head .emoji{font-size:18px;flex-shrink:0;}
        .proy-head .title{flex:1;font-size:13px;font-weight:700;color:var(--texto);font-family:'Nunito',sans-serif;}
        .proy-head .toggle-icon{color:var(--gris-l);font-size:12px;transition:transform .3s;flex-shrink:0;}
        .proy-head .toggle-icon.open{transform:rotate(45deg);color:var(--turquesa);}
        .proy-body{max-height:0;overflow:hidden;transition:max-height .4s ease;}
        .proy-body.open{max-height:3000px;}
        .proy-inner{padding:0 16px 16px;}
        .proy-section{margin-bottom:10px;}
        .proy-section h5{font-size:11px;font-weight:800;color:var(--caribe);text-transform:uppercase;letter-spacing:.5px;margin:0 0 6px;display:flex;align-items:center;gap:6px;font-family:'Nunito',sans-serif;}
        .proy-section p{font-size:12px;color:var(--gris);line-height:1.6;margin:0;}
        .proy-tags{display:flex;flex-wrap:wrap;gap:4px;}
        .proy-tag{display:inline-block;background:var(--tur-l);color:var(--caribe-d);padding:3px 10px;border-radius:6px;font-size:11px;font-weight:700;}
        .proy-tag.green{background:var(--palma-l);color:#1E5F36;}
        .proy-tag.yellow{background:var(--sol-l);color:var(--sol-d);}
        .proy-tag.pink{background:var(--lila-l);color:#6B3A8A;}

        /* ── TABLE ── */
        .table-wrap{overflow-x:auto;border-radius:var(--radius);border:1px solid var(--border);}
        .ee-table{width:100%;border-collapse:collapse;font-size:12px;}
        .ee-table th{background:var(--navy);color:#fff;padding:10px 12px;text-align:left;font-weight:700;font-size:11px;position:sticky;top:0;z-index:2;font-family:'Nunito',sans-serif;}
        .ee-table td{padding:8px 12px;border-bottom:1px solid var(--border);color:var(--gris);}
        .ee-table tr:hover td{background:var(--tur-l);}
        .ee-table tr:nth-child(even) td{background:var(--bg);}
        .zone-badge{display:inline-block;padding:2px 8px;border-radius:6px;font-size:10px;font-weight:700;font-family:'Nunito',sans-serif;}
        .zone-rural{background:var(--palma-l);color:#1E5F36;}
        .zone-urban{background:var(--tur-l);color:var(--caribe-d);}
        .zone-indig{background:var(--sol-l);color:var(--sol-d);}

        /* ── PROGRESS ── */
        .progress-bar{height:8px;border-radius:4px;background:var(--border);overflow:hidden;}
        .progress-fill{height:100%;border-radius:4px;transition:width 1.5s ease;}

        /* ── META ITEM ── */
        .meta-item{display:flex;align-items:center;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--border);gap:10px;}
        .meta-item:last-child{border-bottom:none;}
        .meta-label{font-size:13px;color:var(--gris);flex:1;}
        .meta-value{font-weight:800;font-size:13px;padding:4px 12px;border-radius:8px;white-space:nowrap;font-family:'Nunito',sans-serif;}
        .badge{display:inline-flex;align-items:center;padding:4px 12px;border-radius:20px;font-size:11px;font-weight:700;gap:4px;font-family:'Nunito',sans-serif;}

        /* ── MODALS ── */
        .modal-bg{position:fixed;inset:0;background:rgba(11,37,64,0.7);z-index:2000;display:none;align-items:flex-start;justify-content:center;padding:80px 16px 20px;overflow-y:auto;}
        .modal-bg.open{display:flex;}
        .modal-box{background:var(--white);border-radius:20px;width:100%;max-width:600px;overflow:hidden;box-shadow:0 20px 60px rgba(11,37,64,0.3);animation:modalIn .3s ease;}
        @keyframes modalIn{from{opacity:0;transform:translateY(-20px);}to{opacity:1;transform:translateY(0);}}
        .modal-head{padding:20px 24px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--border);}
        .modal-head h3{margin:0;font-size:16px;font-weight:800;color:var(--texto);font-family:'Nunito',sans-serif;}
        .modal-close{width:32px;height:32px;border-radius:8px;border:none;background:var(--bg);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:16px;color:var(--gris);transition:all .2s;}
        .modal-close:hover{background:var(--border);color:var(--texto);}
        .search-input-wrap{padding:16px 24px;position:relative;}
        .search-input-wrap i{position:absolute;left:40px;top:50%;transform:translateY(-50%);color:var(--gris-l);font-size:16px;}
        .search-input-wrap input{width:100%;padding:12px 16px 12px 44px;border:2px solid var(--border);border-radius:var(--radius);font-size:14px;transition:border-color .2s;outline:none;font-family:'Nunito Sans',sans-serif;}
        .search-input-wrap input:focus{border-color:var(--turquesa);}
        .search-results{padding:0 24px 20px;max-height:50vh;overflow-y:auto;}
        .search-item{display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:10px;text-decoration:none;color:var(--texto);font-size:13px;transition:all .2s;cursor:pointer;}
        .search-item:hover{background:var(--tur-l);}
        .search-item i{color:var(--turquesa);font-size:12px;flex-shrink:0;}
        .search-item .cat{font-size:10px;color:var(--gris-l);margin-left:auto;white-space:nowrap;}
        .info-modal-bg{position:fixed;inset:0;background:rgba(11,37,64,0.7);z-index:2000;display:none;align-items:center;justify-content:center;padding:20px;}
        .info-modal-bg.open{display:flex;}
        .info-modal{background:var(--white);border-radius:20px;width:100%;max-width:750px;max-height:85vh;overflow-y:auto;box-shadow:0 20px 60px rgba(11,37,64,0.3);animation:modalIn .3s ease;}
        .info-modal-head{padding:24px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:var(--white);z-index:5;border-radius:20px 20px 0 0;}
        .info-modal-body{padding:24px;}

        /* ── QUOTE ── */
        .quote-box{background:linear-gradient(135deg,var(--tur-l),#C5F2F8);border-radius:14px;padding:20px;border-left:4px solid var(--caribe);position:relative;}
        .quote-box::before{content:'"';font-size:48px;font-weight:900;color:rgba(8,145,178,0.15);position:absolute;top:8px;left:12px;line-height:1;font-family:'Nunito',sans-serif;}
        .quote-box p{margin:0;font-size:13px;color:var(--gris);line-height:1.7;font-style:italic;padding-left:24px;}
        .quote-author{margin-top:12px;padding-left:24px;font-size:12px;color:var(--gris);font-style:normal;font-weight:700;}

        /* ── OBJ CARD ── */
        .obj-card{display:flex;gap:12px;align-items:flex-start;padding:16px;border-radius:var(--radius);transition:all .2s;cursor:default;}
        .obj-card:hover{background:var(--sol-l);transform:translateX(4px);}
        .obj-num{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:900;font-size:14px;color:#fff;flex-shrink:0;font-family:'Nunito',sans-serif;}
        .obj-card p{margin:0;font-size:13px;color:var(--gris);line-height:1.6;}

        /* ── STEP CARD ── */
        .step-card{display:flex;gap:14px;align-items:flex-start;padding:16px;border-radius:14px;transition:all .3s;cursor:pointer;border:1px solid transparent;}
        .step-card:hover{background:var(--sol-l);border-color:var(--arena-l);transform:translateX(4px);}
        .step-num{width:40px;height:40px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:900;font-size:15px;color:#fff;flex-shrink:0;font-family:'Nunito',sans-serif;}
        .step-card .detail{max-height:0;overflow:hidden;transition:max-height .4s ease;margin-top:0;}
        .step-card.expanded .detail{max-height:500px;margin-top:8px;}

        /* ── FLOAT BUTTONS ── */
        .float-group{position:fixed;bottom:20px;right:20px;z-index:900;display:flex;flex-direction:column;gap:10px;align-items:flex-end;}
        .float-btn{width:50px;height:50px;border-radius:50%;border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:18px;transition:all .2s;box-shadow:0 4px 15px rgba(11,37,64,0.2);}
        .float-btn:hover{transform:scale(1.1);}
        .float-btn.primary{background:linear-gradient(135deg,var(--caribe-d),var(--turquesa));color:#fff;}
        .float-btn.secondary{background:var(--white);color:var(--caribe);font-size:16px;}
        .float-btn.secondary:hover{background:var(--tur-l);}

        /* ── COMITÉ ── */
        .comite-person{display:flex;align-items:center;gap:12px;padding:10px;border-radius:10px;transition:background .2s;}
        .comite-person:hover{background:var(--bg);}
        .comite-avatar{width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:12px;color:#fff;flex-shrink:0;font-family:'Nunito',sans-serif;}
        .comite-info{flex:1;}
        .comite-info .name{font-size:12px;font-weight:700;color:var(--texto);margin:0;font-family:'Nunito',sans-serif;}
        .comite-info .role{font-size:10px;color:var(--gris);margin:0;}

        /* ── NUESTRA VOZ PULSE ── */
        .nuestravoz-pulse{animation:nuestravozPulse 2.5s ease-in-out infinite;}
        @keyframes nuestravozPulse{0%,100%{box-shadow:0 6px 20px rgba(45,138,78,0.4);}50%{box-shadow:0 6px 30px rgba(45,138,78,0.7);}}

        /* ── PRINT ── */
        @media print{
            .nav-fixed,.sidebar,.sidebar-overlay,.float-group,.modal-bg,.info-modal-bg{display:none!important;}
            .hero{padding:40px 20px!important;}
            .sec-body{max-height:none!important;}
            body{background:#fff;}
        }
    </style>
</head>

<body>

<nav class="nav-fixed" id="mainNav">
    <div class="nav-inner">
        <div class="nav-logo">
            <button onclick="toggleSidebar()" class="nav-btn" title="Menú"><i class="fas fa-bars"></i></button>
            <span>📚 PEM Necoclí <span style="font-weight:400;color:#A8EEF5;">2025–2035</span></span>
        </div>
        <div class="nav-actions">
            <span class="nav-badge">Un acuerdo por la calidad y la equidad</span>
            <button onclick="openSearch()" class="nav-btn" title="Buscar (Ctrl+K)"><i class="fas fa-search"></i></button>
            <button onclick="openComite()" class="nav-btn" title="Comité PEM"><i class="fas fa-users"></i></button>
        </div>
    </div>
</nav>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>
<aside class="sidebar" id="sidebar">
    <div class="sidebar-head">
        <h3>📖 Navegación del PEM</h3>
        <button class="sidebar-close" onclick="toggleSidebar()"><i class="fas fa-times"></i></button>
    </div>
    <nav class="sidebar-nav">
        <a href="#inicio" onclick="goTo(event,'inicio')"><i class="fas fa-home"></i> Inicio</a>
        <div class="nav-divider">Fundamentos</div>
        <a href="#presentacion" onclick="goTo(event,'presentacion')"><i class="fas fa-bullhorn"></i> Presentación</a>
        <a href="#mision-vision" onclick="goTo(event,'mision-vision')"><i class="fas fa-compass"></i> Misión y Visión</a>
        <a href="#valores" onclick="goTo(event,'valores')"><i class="fas fa-heart"></i> Valores</a>
        <a href="#objetivos" onclick="goTo(event,'objetivos')"><i class="fas fa-bullseye"></i> Objetivos</a>
        <a href="#enfoques" onclick="goTo(event,'enfoques')"><i class="fas fa-balance-scale"></i> Enfoques (4A)</a>
        <a href="#referentes" onclick="goTo(event,'referentes')"><i class="fas fa-gavel"></i> Marco Normativo</a>
        <div class="nav-divider">Metodología y Contexto</div>
        <a href="#ruta" onclick="goTo(event,'ruta')"><i class="fas fa-history"></i> Cómo se construyó</a>
        <a href="#contexto" onclick="goTo(event,'contexto')"><i class="fas fa-map-marked-alt"></i> Contexto Municipal</a>
        <a href="#contexto-edu" onclick="goTo(event,'contexto-edu')"><i class="fas fa-school"></i> Contexto Educativo</a>
        <a href="#diagnostico" onclick="goTo(event,'diagnostico')"><i class="fas fa-stethoscope"></i> Diagnóstico</a>
        <div class="nav-divider">Estrategia</div>
        <a href="#lineas" onclick="goTo(event,'lineas')"><i class="fas fa-layer-group"></i> Líneas Estratégicas</a>
        <a href="#linea1" onclick="goTo(event,'linea1')"><i class="fas fa-users" style="color:#5DB87A;"></i> L1: Equidad</a>
        <a href="#linea2" onclick="goTo(event,'linea2')"><i class="fas fa-lightbulb" style="color:#05C2D8;"></i> L2: Calidad</a>
        <a href="#linea3" onclick="goTo(event,'linea3')"><i class="fas fa-seedling" style="color:#F5A820;"></i> L3: Identidad</a>
        <a href="#linea4" onclick="goTo(event,'linea4')"><i class="fas fa-handshake" style="color:#E8756A;"></i> L4: Gobernanza</a>
        <div class="nav-divider">Seguimiento</div>
        <a href="#metas" onclick="goTo(event,'metas')"><i class="fas fa-chart-line"></i> Metas 2035</a>
        <a href="#seguimiento" onclick="goTo(event,'seguimiento')"><i class="fas fa-clipboard-check"></i> Seguimiento</a>
        <a href="#hoja-ruta" onclick="goTo(event,'hoja-ruta')"><i class="fas fa-map"></i> Hoja de Ruta</a>
        <div class="nav-divider">Participación</div>
        <a href="#nuestra-palabra" onclick="goTo(event,'nuestra-palabra')" style="color:#5DB87A;font-weight:700;"><i class="fas fa-vote-yea" style="color:#5DB87A;"></i> Nuestra Palabra</a>
    </nav>
    <div class="sidebar-footer"><p>Secretaría de Educación, Cultura y Deportes<br>Municipio de Necoclí • Antioquia</p></div>
</aside>

<div class="modal-bg" id="searchModal">
    <div class="modal-box">
        <div class="modal-head">
            <h3><i class="fas fa-search" style="color:#05C2D8;margin-right:6px;"></i> Buscar en el PEM</h3>
            <button class="modal-close" onclick="closeSearch()"><i class="fas fa-times"></i></button>
        </div>
        <div class="search-input-wrap">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Escribe para buscar secciones, proyectos, conceptos..." oninput="doSearch()">
        </div>
        <div class="search-results" id="searchResults">
            <p style="color:#94A3B8;font-size:13px;text-align:center;padding:20px;">Escribe al menos 2 caracteres para buscar</p>
        </div>
    </div>
</div>

<div class="info-modal-bg" id="comiteModal">
    <div class="info-modal" style="max-width:600px;">
        <div class="info-modal-head">
            <h3 style="margin:0;font-size:16px;font-weight:700;">👥 Comité Técnico PEM</h3>
            <button class="modal-close" onclick="closeComite()"><i class="fas fa-times"></i></button>
        </div>
        <div class="info-modal-body">
            <div class="comite-person"><div class="comite-avatar" style="background:linear-gradient(135deg,#0891B2,#05C2D8);">SC</div><div class="comite-info"><p class="name">Sandra Patricia Cardales Chaverra</p><p class="role">Secretaria de Educación, Cultura y Deportes</p></div></div>
            <div class="comite-person"><div class="comite-avatar" style="background:linear-gradient(135deg,#8B52B0,#B88DD4);">LM</div><div class="comite-info"><p class="name">Luz Yaned Macías Valencia</p><p class="role">Secretaria de Gobierno</p></div></div>
            <div class="comite-person"><div class="comite-avatar" style="background:linear-gradient(135deg,#2D8A4E,#5DB87A);">HH</div><div class="comite-info"><p class="name">Héctor Henao Henao</p><p class="role">Coordinador I.E.R. El Totumo</p></div></div>
            <div class="comite-person"><div class="comite-avatar" style="background:linear-gradient(135deg,#dc2626,#f87171);">CR</div><div class="comite-info"><p class="name">Carolina Rojas Vélez</p><p class="role">Coordinadora I.E.R. San Sebastián de Urabá</p></div></div>
            <div class="comite-person"><div class="comite-avatar" style="background:linear-gradient(135deg,#C8840A,#F5A820);">SC</div><div class="comite-info"><p class="name">Sady Córdoba Zapata</p><p class="role">Docente Orientadora I.E.R. San Sebastián de Urabá</p></div></div>
            <div class="comite-person"><div class="comite-avatar" style="background:linear-gradient(135deg,#0891b2,#22d3ee);">JO</div><div class="comite-info"><p class="name">Javier Darío Oliveros Graciano</p><p class="role">Rector I.E.R. Mello Villavicencio</p></div></div>
            <div class="comite-person"><div class="comite-avatar" style="background:linear-gradient(135deg,#E8756A,#E8756A);">DB</div><div class="comite-info"><p class="name">Diana Barrientos</p><p class="role">Coordinadora Politécnico Grancolombiano – Mesa Educación Superior</p></div></div>
            <div class="comite-person"><div class="comite-avatar" style="background:linear-gradient(135deg,#4338ca,#818cf8);">MH</div><div class="comite-info"><p class="name">Mauricio Henao</p><p class="role">Docente I.E.R. Las Changas</p></div></div>
            <div class="comite-person"><div class="comite-avatar" style="background:linear-gradient(135deg,#C8904A,#F5A820);">ER</div><div class="comite-info"><p class="name">Edwin Enrique Román Madrid</p><p class="role">Profesional Líder Educación – Fundación Grupo Social</p></div></div>
        </div>
    </div>
</div>

<div class="info-modal-bg" id="detailModal">
    <div class="info-modal">
        <div class="info-modal-head">
            <h3 id="detailTitle" style="margin:0;font-size:16px;font-weight:700;"></h3>
            <button class="modal-close" onclick="closeDetail()"><i class="fas fa-times"></i></button>
        </div>
        <div class="info-modal-body" id="detailBody"></div>
    </div>
</div>

<header class="hero" id="inicio">
    <div class="hero-tag">🏛️ Acuerdo Municipal • Necoclí, Antioquia</div>
    <h1>Plan Educativo Municipal</h1>
    <p class="subtitle">Necoclí 2025 – 2035</p>
    <p class="tagline">Un acuerdo por la calidad y la equidad educativa</p>
    <div class="hero-btns">
        <a href="#lineas" class="hero-btn primary"><i class="fas fa-layer-group"></i> Líneas Estratégicas</a>
        <a href="#hoja-ruta" class="hero-btn secondary"><i class="fas fa-map"></i> Hoja de Ruta</a>
        <a href="#nuestra-palabra" class="hero-btn" style="background:rgba(52,211,153,0.2);color:#fff;backdrop-filter:blur(5px);border:2px solid rgba(52,211,153,0.5);font-weight:700;"><i class="fas fa-vote-yea"></i> Nuestra Palabra</a>
    </div>
</header>
<svg class="wave-bottom" viewBox="0 0 1440 60" preserveAspectRatio="none"><path d="M0,30 C360,60 720,0 1080,30 C1260,45 1380,20 1440,30 L1440,60 L0,60Z" fill="#F5F4EF"/></svg>

<section class="stats-bar">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background:linear-gradient(135deg,#2D8A4E,#5DB87A);"><i class="fas fa-user-graduate"></i></div>
            <div class="stat-num" id="animStat1">0</div>
            <div class="stat-label">Estudiantes</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:linear-gradient(135deg,#0891B2,#05C2D8);"><i class="fas fa-school"></i></div>
            <div class="stat-num" id="animStat2">0</div>
            <div class="stat-label">EE Oficiales</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:linear-gradient(135deg,#8B52B0,#B88DD4);"><i class="fas fa-chalkboard-teacher"></i></div>
            <div class="stat-num" id="animStat3">0</div>
            <div class="stat-label">Docentes</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:linear-gradient(135deg,#C8840A,#F5A820);"><i class="fas fa-building"></i></div>
            <div class="stat-num" id="animStat4">0</div>
            <div class="stat-label">Sedes educativas</div>
        </div>
    </div>
</section>

<main class="main-content">

    <!-- PRESENTACIÓN -->
    <section id="presentacion">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#0891B2,#05C2D8);"><i class="fas fa-bullhorn"></i></div>
                <div class="sec-info"><h2>Presentación</h2><p>Palabras del Alcalde Municipal</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner">
                    <div class="quote-box" style="margin-bottom:16px;">
                        <p>La estructura territorial del municipio de Necoclí fue construida por la naturaleza para ser educativa. Basta con vislumbrar los hechos históricos del territorio —desde las culturas milenarias aborígenes, pasando por la conquista española, hasta el posicionamiento de la actual población con sus orígenes caribeños— para entender que el territorio habla y da instrucciones educativas que sólo necesitan ser interpretadas.</p>
                        <div class="quote-author"><strong>Guillermo José Cardona Moreno</strong> — Alcalde Municipal 2024–2027</div>
                    </div>
                    <p style="font-size:13px;color:#5A6B82;line-height:1.7;margin-bottom:12px;">El PEM como herramienta pedagógica da los lineamientos para el engranaje educativo funcional: infraestructura física y digital, docentes comprometidos, cohesión familiar y enfoque diferencial transversalizado.</p>
                    <p style="font-size:13px;color:#5A6B82;line-height:1.7;margin-bottom:12px;">El fondo musical de este proyecto suena con melodías de <strong>acceso y permanencia</strong>: PAE, transporte escolar y pertinencia curricular.</p>
                    <div style="background:#F5F4EF;border-radius:12px;padding:14px;display:flex;align-items:center;gap:12px;margin-top:16px;">
                        <div style="width:48px;height:48px;border-radius:14px;background:linear-gradient(135deg,#0891B2,#05C2D8);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:14px;flex-shrink:0;">GC</div>
                        <div>
                            <div style="font-weight:700;font-size:13px;color:#1A3344;">Guillermo José Cardona Moreno</div>
                            <div style="font-size:11px;color:#5A6B82;">Alcalde Municipal 2024–2027</div>
                        </div>
                    </div>
                    <p style="font-size:12px;color:#5A6B82;margin-top:12px;font-style:italic;">Agradecimiento especial a la Fundación Grupo Social.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- MISIÓN Y VISIÓN -->
    <section id="mision-vision">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#8B52B0,#B88DD4);"><i class="fas fa-compass"></i></div>
                <div class="sec-info"><h2>Misión y Visión</h2><p>¿Para qué educamos? ¿Hacia dónde vamos?</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner">
                    <div class="grid-2">
                        <div style="background:linear-gradient(135deg,#F3EEF8,#EDE0F8);border-radius:14px;padding:20px;border-top:4px solid #8B52B0;">
                            <h3 style="font-size:14px;font-weight:700;color:#6B3A8A;margin:0 0 8px;display:flex;align-items:center;gap:6px;"><i class="fas fa-crosshairs"></i> Misión</h3>
                            <p style="font-size:13px;color:#2A4560;line-height:1.7;margin:0;">Aportar a la transformación de la sociedad necocliseña, a través de un sistema educativo <strong>innovador</strong> que promueva el desarrollo integral, garantice acceso equitativo, valore la identidad local y forme líderes comprometidos con un futuro mejor.</p>
                        </div>
                        <div style="background:linear-gradient(135deg,#eef2ff,#e0e7ff);border-radius:14px;padding:20px;border-top:4px solid #6366f1;">
                            <h3 style="font-size:14px;font-weight:700;color:#3730a3;margin:0 0 8px;display:flex;align-items:center;gap:6px;"><i class="fas fa-eye"></i> Visión 2036</h3>
                            <p style="font-size:13px;color:#2A4560;line-height:1.7;margin:0;">Necoclí será <strong>referente en educación</strong>, garantizando cobertura, permanencia, calidad e inclusión; articulando a las familias con los diversos actores sociales.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- VALORES -->
    <section id="valores">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#e11d48,#fb7185);"><i class="fas fa-heart"></i></div>
                <div class="sec-info"><h2>Valores</h2><p>Principios que orientan nuestras decisiones</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner">
                    <div class="grid-6">
                        <div class="valor-card"><div class="valor-icon" style="background:linear-gradient(135deg,#0891B2,#05C2D8);"><i class="fas fa-hands-helping"></i></div><h4>Colaboración</h4><p>Trabajamos juntos compartiendo conocimientos y recursos</p></div>
                        <div class="valor-card"><div class="valor-icon" style="background:linear-gradient(135deg,#2D8A4E,#5DB87A);"><i class="fas fa-leaf"></i></div><h4>Desarrollo Sostenible</h4><p>Progreso social, económico y ambiental</p></div>
                        <div class="valor-card"><div class="valor-icon" style="background:linear-gradient(135deg,#C8840A,#F5A820);"><i class="fas fa-theater-masks"></i></div><h4>Identidad Cultural</h4><p>Valoramos la diversidad y el patrimonio</p></div>
                        <div class="valor-card"><div class="valor-icon" style="background:linear-gradient(135deg,#8B52B0,#B88DD4);"><i class="fas fa-fist-raised"></i></div><h4>Ciudadanía Activa</h4><p>Respetamos derechos y promovemos participación</p></div>
                        <div class="valor-card"><div class="valor-icon" style="background:linear-gradient(135deg,#dc2626,#f87171);"><i class="fas fa-sync-alt"></i></div><h4>Adaptabilidad</h4><p>Aprendemos de los desafíos con soluciones innovadoras</p></div>
                        <div class="valor-card"><div class="valor-icon" style="background:linear-gradient(135deg,#0891b2,#22d3ee);"><i class="fas fa-rocket"></i></div><h4>Innovación Sostenible</h4><p>Prácticas que benefician comunidad y medio ambiente</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OBJETIVOS -->
    <section id="objetivos">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#C8840A,#F5A820);"><i class="fas fa-bullseye"></i></div>
                <div class="sec-info"><h2>Objetivos del PEM</h2><p>6 objetivos estratégicos</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner" id="objSection"></div>
            </div>
        </div>
    </section>

    <!-- ENFOQUES -->
    <section id="enfoques">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#4338ca,#818cf8);"><i class="fas fa-balance-scale"></i></div>
                <div class="sec-info"><h2>Enfoques – Modelo de las 4A</h2><p>Educación como derecho humano (Katarina Tomaševski)</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner" id="enfoquesSection"></div>
            </div>
        </div>
    </section>

    <!-- REFERENTES NORMATIVOS -->
    <section id="referentes">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#b91c1c,#ef4444);"><i class="fas fa-gavel"></i></div>
                <div class="sec-info"><h2>Referentes de Política Pública</h2><p>Marco normativo multiescalar</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner">
                    <div class="tab-group" data-tabgroup="referentes">
                        <div class="tabs">
                            <button class="tab-btn active" data-tab="tab-inter">🌍 Internacional</button>
                            <button class="tab-btn" data-tab="tab-nac">🇨🇴 Nacional</button>
                            <button class="tab-btn" data-tab="tab-dep">🏔️ Departamental</button>
                            <button class="tab-btn" data-tab="tab-mun">🏘️ Municipal</button>
                        </div>
                        <div id="tab-inter" class="tab-panel active">
                            <div style="display:grid;gap:8px;">
                                <div style="background:#F0FBFC;border-radius:10px;padding:12px;display:flex;align-items:center;gap:10px;"><span class="badge" style="background:#E0F9FC;color:#0891B2;flex-shrink:0;">ODS 4</span><span style="font-size:13px;">Educación inclusiva, equitativa y de calidad</span></div>
                                <div style="background:#F0FBFC;border-radius:10px;padding:12px;display:flex;align-items:center;gap:10px;"><span class="badge" style="background:#E0F9FC;color:#0891B2;flex-shrink:0;">ODS 10</span><span style="font-size:13px;">Reducir la desigualdad</span></div>
                                <div style="background:#F0FBFC;border-radius:10px;padding:12px;display:flex;align-items:center;gap:10px;"><span class="badge" style="background:#E0F9FC;color:#0891B2;flex-shrink:0;">ODS 11</span><span style="font-size:13px;">Ciudades inclusivas, seguras y sostenibles</span></div>
                                <div style="background:#F0FBFC;border-radius:10px;padding:12px;display:flex;align-items:center;gap:10px;"><span class="badge" style="background:#E0F9FC;color:#0891B2;flex-shrink:0;">ODS 16</span><span style="font-size:13px;">Sociedades pacíficas e inclusivas</span></div>
                                <div style="background:#F5F4EF;border-radius:10px;padding:12px;font-size:12px;color:#5A6B82;">📜 Declaración Universal de los Derechos Humanos (1948) — Art. 26</div>
                                <div style="background:#F5F4EF;border-radius:10px;padding:12px;font-size:12px;color:#5A6B82;">♿ Convención sobre los Derechos de las Personas con Discapacidad (2006) — Art. 24</div>
                            </div>
                        </div>
                        <div id="tab-nac" class="tab-panel">
                            <div style="display:grid;gap:6px;font-size:12px;">
                                <div style="background:#F5F4EF;border-radius:8px;padding:10px;"><strong>Constitución Política (1991)</strong> — Arts. 67 y 70</div>
                                <div style="background:#F5F4EF;border-radius:8px;padding:10px;"><strong>Ley 115 de 1994</strong> — Ley General de Educación</div>
                                <div style="background:#F5F4EF;border-radius:8px;padding:10px;"><strong>Ley 715 de 2001</strong> — Competencias y recursos del sector educativo</div>
                                <div style="background:#F5F4EF;border-radius:8px;padding:10px;"><strong>Ley 1098 de 2006</strong> — Código de Infancia y Adolescencia</div>
                                <div style="background:#F5F4EF;border-radius:8px;padding:10px;"><strong>Ley 1804 de 2016</strong> — Cero a Siempre (Primera Infancia)</div>
                                <div style="background:#F5F4EF;border-radius:8px;padding:10px;"><strong>Decreto 1421 de 2017</strong> — Educación inclusiva</div>
                                <div style="background:#F5F4EF;border-radius:8px;padding:10px;"><strong>CONPES 4080 de 2022</strong> — Educación terciaria</div>
                                <div style="background:#F5F4EF;border-radius:8px;padding:10px;"><strong>Ley 2294 de 2023</strong> — PND 2022–2026</div>
                                <div style="background:#F5F4EF;border-radius:8px;padding:10px;"><strong>Decreto 1075 de 2015</strong> — Decreto Único Reglamentario Educación</div>
                            </div>
                        </div>
                        <div id="tab-dep" class="tab-panel">
                            <div style="background:#F5F4EF;border-radius:12px;padding:16px;font-size:13px;color:#2A4560;line-height:1.7;">
                                <strong>Plan de Desarrollo Departamental de Antioquia 2024–2027</strong> "Por Antioquia Firme, en Orden y con Carácter" — Educación transformadora e inclusiva, cierre de brechas urbanas-rurales, dignificación docente, innovación educativa e infraestructura escolar.
                            </div>
                        </div>
                        <div id="tab-mun" class="tab-panel">
                            <div style="background:#F5F4EF;border-radius:12px;padding:16px;font-size:13px;color:#2A4560;line-height:1.7;">
                                <strong>Plan de Desarrollo Municipal de Necoclí 2024–2027 "Nuestra Identidad"</strong> — Sistema educativo territorial robusto, participación ciudadana, infraestructura, inclusión de comunidades rurales y étnicas.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CÓMO SE CONSTRUYÓ EL PEM -->
    <section id="ruta">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#0891B2,#05C2D8);"><i class="fas fa-history"></i></div>
                <div class="sec-info"><h2>Cómo se construyó el PEM</h2><p>6 fases participativas • 2023–2025</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner" id="timelineSection"></div>
            </div>
        </div>
    </section>

    <!-- CONTEXTO MUNICIPAL -->
    <section id="contexto">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#C8904A,#F5A820);"><i class="fas fa-map-marked-alt"></i></div>
                <div class="sec-info"><h2>Contexto Municipal</h2><p>Demografía, economía, diversidad étnica y territorio</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner">
                    <div class="tab-group" data-tabgroup="contexto">
                        <div class="tabs">
                            <button class="tab-btn active" data-tab="ctx-demo">👥 Demografía</button>
                            <button class="tab-btn" data-tab="ctx-econ">💼 Economía</button>
                            <button class="tab-btn" data-tab="ctx-etni">🎭 Diversidad étnica</button>
                            <button class="tab-btn" data-tab="ctx-serv">🏠 Servicios</button>
                            <button class="tab-btn" data-tab="ctx-migr">✈️ Migración</button>
                        </div>
                        <div id="ctx-demo" class="tab-panel active">
                            <div class="grid-4" style="margin-bottom:12px;">
                                <div style="background:#FFF3D6;border-radius:12px;padding:14px;text-align:center;"><div style="font-weight:800;color:#9B6030;font-size:1.3rem;">46.213</div><div style="font-size:10px;color:#5A6B82;">Habitantes</div></div>
                                <div style="background:#FFF3D6;border-radius:12px;padding:14px;text-align:center;"><div style="font-weight:800;color:#9B6030;font-size:1.3rem;">1.361</div><div style="font-size:10px;color:#5A6B82;">km² extensión</div></div>
                                <div style="background:#FFF3D6;border-radius:12px;padding:14px;text-align:center;"><div style="font-weight:800;color:#9B6030;font-size:1.3rem;">8</div><div style="font-size:10px;color:#5A6B82;">Corregimientos</div></div>
                                <div style="background:#FFF3D6;border-radius:12px;padding:14px;text-align:center;"><div style="font-weight:800;color:#9B6030;font-size:1.3rem;">69%</div><div style="font-size:10px;color:#5A6B82;">Población rural</div></div>
                            </div>
                            <p style="font-size:12px;color:#5A6B82;line-height:1.6;">La mayoría de habitantes (73%) han vivido siempre en Necoclí. Edad promedio 28-29 años. Más de la mitad de la población es femenina. Tamaño promedio por hogar: 3,1 personas.</p>
                        </div>
                        <div id="ctx-econ" class="tab-panel">
                            <p style="font-size:12px;color:#5A6B82;line-height:1.6;margin-bottom:12px;">El 40% de la PEA trabaja en agricultura, ganadería, caza, silvicultura y pesca. Principales cultivos: plátano (28.497 ton), maracuyá (22.836 ton), yuca (5.594 ton).</p>
                            <div class="grid-3">
                                <div style="background:#fef2f2;border-radius:10px;padding:12px;text-align:center;"><div style="font-weight:800;color:#991b1b;font-size:1.1rem;">14,92%</div><div style="font-size:10px;color:#5A6B82;">Tasa desempleo (2021)</div></div>
                                <div style="background:#fef2f2;border-radius:10px;padding:12px;text-align:center;"><div style="font-weight:800;color:#991b1b;font-size:1.1rem;">83,92%</div><div style="font-size:10px;color:#5A6B82;">Empleo informal</div></div>
                                <div style="background:#fef2f2;border-radius:10px;padding:12px;text-align:center;"><div style="font-weight:800;color:#991b1b;font-size:1.1rem;">67,71%</div><div style="font-size:10px;color:#5A6B82;">Línea de pobreza</div></div>
                            </div>
                        </div>
                        <div id="ctx-etni" class="tab-panel">
                            <div style="margin-bottom:12px;">
                                <div style="margin-bottom:10px;"><span style="font-size:13px;color:#2A4560;">Afrocolombiano, negro o mulato — 49%</span><div class="progress-bar" style="margin-top:4px;"><div class="progress-fill" style="width:49%;background:linear-gradient(90deg,#8B52B0,#B88DD4);"></div></div></div>
                                <div style="margin-bottom:10px;"><span style="font-size:13px;color:#2A4560;">Sin identificación étnica — 42%</span><div class="progress-bar" style="margin-top:4px;"><div class="progress-fill" style="width:42%;background:linear-gradient(90deg,#5A6B82,#94A3B8);"></div></div></div>
                                <div style="margin-bottom:10px;"><span style="font-size:13px;color:#2A4560;">Indígena — 8%</span><div class="progress-bar" style="margin-top:4px;"><div class="progress-fill" style="width:8%;background:linear-gradient(90deg,#2D8A4E,#5DB87A);"></div></div></div>
                                <div><span style="font-size:13px;color:#2A4560;">Palenquero — 1%</span><div class="progress-bar" style="margin-top:4px;"><div class="progress-fill" style="width:2%;background:linear-gradient(90deg,#C8840A,#F5A820);"></div></div></div>
                            </div>
                            <div style="background:#FFF3D6;border-radius:12px;padding:14px;border-left:4px solid #C8840A;">
                                <p style="font-size:12px;color:#2A4560;margin:0;line-height:1.6;"><strong>Resguardo Caimán Nuevo:</strong> Comunidad Kuna (Tule/Guna Dule) — 467 personas.<br><strong>Resguardo El Volao:</strong> Comunidad Zenú — 1.813 personas.</p>
                            </div>
                        </div>
                        <div id="ctx-serv" class="tab-panel">
                            <p style="font-size:12px;color:#5A6B82;line-height:1.6;margin-bottom:8px;">Cobertura de servicios públicos:</p>
                            <div style="display:grid;gap:6px;">
                                <div style="display:flex;justify-content:space-between;font-size:12px;padding:6px 0;border-bottom:1px solid #F0F4F8;"><span>⚡ Energía eléctrica</span><strong style="color:#2D8A4E;">91%</strong></div>
                                <div style="display:flex;justify-content:space-between;font-size:12px;padding:6px 0;border-bottom:1px solid #F0F4F8;"><span>📱 Señal de celular</span><strong style="color:#2D8A4E;">81%</strong></div>
                                <div style="display:flex;justify-content:space-between;font-size:12px;padding:6px 0;border-bottom:1px solid #F0F4F8;"><span>🚰 Acueducto</span><strong style="color:#C8840A;">34%</strong></div>
                                <div style="display:flex;justify-content:space-between;font-size:12px;padding:6px 0;border-bottom:1px solid #F0F4F8;"><span>🚿 Alcantarillado</span><strong style="color:#dc2626;">31%</strong></div>
                                <div style="display:flex;justify-content:space-between;font-size:12px;padding:6px 0;border-bottom:1px solid #F0F4F8;"><span>🌐 Internet</span><strong style="color:#dc2626;">12%</strong></div>
                                <div style="display:flex;justify-content:space-between;font-size:12px;padding:6px 0;"><span>🗑️ Recolección basura</span><strong style="color:#C8840A;">45%</strong></div>
                            </div>
                        </div>
                        <div id="ctx-migr" class="tab-panel">
                            <p style="font-size:12px;color:#5A6B82;line-height:1.7;margin-bottom:10px;">Necoclí es corredor clave hacia el Tapón del Darién. En 2023 albergó 787 migrantes venezolanos.</p>
                            <div style="background:#EFF8F2;border-radius:12px;padding:14px;border-left:4px solid #2D8A4E;margin-bottom:10px;">
                                <p style="margin:0;font-size:12px;color:#1E5F36;line-height:1.6;"><strong>Reducción 2025:</strong> Caída del 98% en detecciones migratorias. Panamá redujo 94% en enero 2025.</p>
                            </div>
                            <p style="font-size:12px;color:#5A6B82;line-height:1.7;"><strong>Impactos:</strong> Reducción de presión sobre servicios, choque económico, aumento de flujo inverso y nuevos desafíos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTEXTO EDUCATIVO -->
    <section id="contexto-edu">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#0891B2,#05C2D8);"><i class="fas fa-school"></i></div>
                <div class="sec-info"><h2>Contexto Educativo</h2><p>19 EE Oficiales • 127 sedes • 13.301 estudiantes</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner">
                    <div class="tab-group" data-tabgroup="contexto-edu">
                        <div class="tabs">
                            <button class="tab-btn active" data-tab="edu-datos">📊 Datos clave</button>
                            <button class="tab-btn" data-tab="edu-tabla">📋 Tabla EE</button>
                            <button class="tab-btn" data-tab="edu-planta">👩‍🏫 Planta docente</button>
                        </div>
                        <div id="edu-datos" class="tab-panel active">
                            <div class="grid-4" style="margin-bottom:16px;">
                                <div style="background:#F0FBFC;border-radius:12px;padding:14px;text-align:center;"><div style="font-weight:800;color:#0891B2;font-size:1.1rem;">70%</div><div style="font-size:10px;color:#5A6B82;">Matrícula rural</div></div>
                                <div style="background:#F0FBFC;border-radius:12px;padding:14px;text-align:center;"><div style="font-weight:800;color:#0891B2;font-size:1.1rem;">89%</div><div style="font-size:10px;color:#5A6B82;">EEO rurales</div></div>
                                <div style="background:#F0FBFC;border-radius:12px;padding:14px;text-align:center;"><div style="font-weight:800;color:#0891B2;font-size:1.1rem;">689</div><div style="font-size:10px;color:#5A6B82;">Prom. est./EEO</div></div>
                                <div style="background:#F0FBFC;border-radius:12px;padding:14px;text-align:center;"><div style="font-weight:800;color:#0891B2;font-size:1.1rem;">6,9</div><div style="font-size:10px;color:#5A6B82;">Prom. sedes/EEO</div></div>
                            </div>
                            <div style="background:#FFF3D6;border-radius:12px;padding:14px;border-left:4px solid #C8840A;font-size:12px;color:#2A4560;line-height:1.6;">
                                <strong>⚠️ Casos que requieren atención:</strong> I.E. Eduardo Espitia y Antonio Roldán superan 1.500 estudiantes. Mulaticos Piedrecitas tiene 26 sedes.
                            </div>
                        </div>
                        <div id="edu-tabla" class="tab-panel">
                            <div class="table-wrap" style="max-height:400px;overflow-y:auto;">
                                <table class="ee-table">
                                    <thead><tr><th>Establecimiento Educativo</th><th>Est.</th><th>Sedes</th><th>Zona</th></tr></thead>
                                    <tbody id="eeTableBody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div id="edu-planta" class="tab-panel">
                            <div class="grid-3" style="margin-bottom:16px;">
                                <div style="background:#F3EEF8;border-radius:12px;padding:16px;text-align:center;"><div style="font-weight:800;color:#6B3A8A;font-size:1.4rem;"> 590 docentes oficiales y 40 en cobertura </div><div style="font-size:11px;color:#5A6B82;">Docentes de aula</div></div>
                                <div style="background:#F3EEF8;border-radius:12px;padding:16px;text-align:center;"><div style="font-weight:800;color:#6B3A8A;font-size:1.4rem;">14</div><div style="font-size:11px;color:#5A6B82;">Orientadores</div></div>
                                <div style="background:#F3EEF8;border-radius:12px;padding:16px;text-align:center;"><div style="font-weight:800;color:#6B3A8A;font-size:1.4rem;">15</div><div style="font-size:11px;color:#5A6B82;">Rectores</div></div>
                            </div>
                            <div style="display:grid;gap:8px;">
                                <div><span style="font-size:12px;color:#2A4560;">60%+ con formación posgradual</span><div class="progress-bar" style="margin-top:4px;"><div class="progress-fill" style="width:60%;background:linear-gradient(90deg,#8B52B0,#B88DD4);"></div></div></div>
                                <div><span style="font-size:12px;color:#2A4560;">147 especializaciones</span><div class="progress-bar" style="margin-top:4px;"><div class="progress-fill" style="width:50%;background:linear-gradient(90deg,#0891B2,#05C2D8);"></div></div></div>
                                <div><span style="font-size:12px;color:#2A4560;">107+ maestrías</span><div class="progress-bar" style="margin-top:4px;"><div class="progress-fill" style="width:36%;background:linear-gradient(90deg,#2D8A4E,#5DB87A);"></div></div></div>
                                <div><span style="font-size:12px;color:#2A4560;">328 mujeres / 265 hombres</span><div class="progress-bar" style="margin-top:4px;"><div class="progress-fill" style="width:55%;background:linear-gradient(90deg,#E8756A,#E8756A);"></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DIAGNÓSTICO -->
    <section id="diagnostico">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#E8756A,#E8756A);"><i class="fas fa-stethoscope"></i></div>
                <div class="sec-info"><h2>Diagnóstico Educativo</h2><p>Participativo: ~800 personas</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner">
                    <div class="tab-group" data-tabgroup="diagnostico">
                        <div class="tabs">
                            <button class="tab-btn active" data-tab="dx-prob">⚠️ Problemáticas</button>
                            <button class="tab-btn" data-tab="dx-pot">✅ Potencialidades</button>
                            <button class="tab-btn" data-tab="dx-des">🎯 Desafíos</button>
                        </div>
                        <div id="dx-prob" class="tab-panel active" style="display:grid;gap:6px;">
                            <div style="background:#fef2f2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-exclamation-triangle" style="color:#dc2626;margin-top:2px;flex-shrink:0;"></i><span><strong>Infraestructura:</strong> Deterioro, hacinamiento, falta de mobiliario.</span></div>
                            <div style="background:#fef2f2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-exclamation-triangle" style="color:#dc2626;margin-top:2px;flex-shrink:0;"></i><span><strong>Acceso desigual:</strong> Barreras en zonas rurales dispersas.</span></div>
                            <div style="background:#fef2f2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-exclamation-triangle" style="color:#dc2626;margin-top:2px;flex-shrink:0;"></i><span><strong>Conectividad:</strong> Sin internet estable, sin equipos digitales.</span></div>
                            <div style="background:#fef2f2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-exclamation-triangle" style="color:#dc2626;margin-top:2px;flex-shrink:0;"></i><span><strong>Articulación:</strong> Débil transición entre niveles educativos.</span></div>
                            <div style="background:#fef2f2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-exclamation-triangle" style="color:#dc2626;margin-top:2px;flex-shrink:0;"></i><span><strong>Poblaciones diversas:</strong> Brechas en atención a indígenas, afro y discapacidad.</span></div>
                            <div style="background:#fef2f2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-exclamation-triangle" style="color:#dc2626;margin-top:2px;flex-shrink:0;"></i><span><strong>Competencias:</strong> Rezagos en lenguaje y matemáticas.</span></div>
                            <div style="background:#fef2f2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-exclamation-triangle" style="color:#dc2626;margin-top:2px;flex-shrink:0;"></i><span><strong>Cualificación docente:</strong> Necesidad de formación continua.</span></div>
                            <div style="background:#fef2f2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-exclamation-triangle" style="color:#dc2626;margin-top:2px;flex-shrink:0;"></i><span><strong>Gobernanza:</strong> Dispersión de acciones, baja coordinación.</span></div>
                        </div>
                        <div id="dx-pot" class="tab-panel" style="display:grid;gap:6px;">
                            <div style="background:#EFF8F2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-check-circle" style="color:#2D8A4E;margin-top:2px;flex-shrink:0;"></i><span>Liderazgo comprometido de directivos docentes</span></div>
                            <div style="background:#EFF8F2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-check-circle" style="color:#2D8A4E;margin-top:2px;flex-shrink:0;"></i><span>Experiencias pedagógicas significativas</span></div>
                            <div style="background:#EFF8F2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-check-circle" style="color:#2D8A4E;margin-top:2px;flex-shrink:0;"></i><span>Disposición al trabajo colaborativo</span></div>
                            <div style="background:#EFF8F2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-check-circle" style="color:#2D8A4E;margin-top:2px;flex-shrink:0;"></i><span>JUME, SEDUCA y Mesa Municipal de Educación</span></div>
                            <div style="background:#EFF8F2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-check-circle" style="color:#2D8A4E;margin-top:2px;flex-shrink:0;"></i><span>60%+ docentes con formación posgradual</span></div>
                            <div style="background:#EFF8F2;border-radius:10px;padding:12px;font-size:12px;display:flex;align-items:flex-start;gap:8px;"><i class="fas fa-check-circle" style="color:#2D8A4E;margin-top:2px;flex-shrink:0;"></i><span>Aliados: Fundación Grupo Social y cooperación</span></div>
                        </div>
                        <div id="dx-des" class="tab-panel">
                            <div class="grid-2">
                                <div style="background:#FFFBF0;border-radius:10px;padding:12px;font-size:11px;color:#2A4560;"><i class="fas fa-flag" style="color:#C8840A;margin-right:4px;"></i><strong>Acceso:</strong> Transporte, seguridad, cobertura dispersa.</div>
                                <div style="background:#FFFBF0;border-radius:10px;padding:12px;font-size:11px;color:#2A4560;"><i class="fas fa-flag" style="color:#C8840A;margin-right:4px;"></i><strong>Calidad:</strong> Competencias básicas, digitales, socioemocionales.</div>
                                <div style="background:#FFFBF0;border-radius:10px;padding:12px;font-size:11px;color:#2A4560;"><i class="fas fa-flag" style="color:#C8840A;margin-right:4px;"></i><strong>Infraestructura:</strong> Plantas físicas, conectividad, equipos.</div>
                                <div style="background:#FFFBF0;border-radius:10px;padding:12px;font-size:11px;color:#2A4560;"><i class="fas fa-flag" style="color:#C8840A;margin-right:4px;"></i><strong>Formación docente:</strong> TIC, gestión, metodologías activas.</div>
                                <div style="background:#FFFBF0;border-radius:10px;padding:12px;font-size:11px;color:#2A4560;"><i class="fas fa-flag" style="color:#C8840A;margin-right:4px;"></i><strong>Trayectorias:</strong> Primera infancia → media → terciaria.</div>
                                <div style="background:#FFFBF0;border-radius:10px;padding:12px;font-size:11px;color:#2A4560;"><i class="fas fa-flag" style="color:#C8840A;margin-right:4px;"></i><strong>Atención diferencial:</strong> Indígenas, afro, discapacidad, migrantes.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- LÍNEAS ESTRATÉGICAS OVERVIEW -->
    <section id="lineas" style="padding-top:20px;">
        <div style="text-align:center;margin-bottom:20px;">
            <span class="badge" style="background:#E0F9FC;color:#0891B2;">Direccionamiento Estratégico</span>
            <h2 style="font-size:clamp(1.3rem,3vw,1.8rem);font-weight:900;color:#1A3344;margin:8px 0 4px;">4 Líneas Estratégicas</h2>
            <p style="font-size:13px;color:#5A6B82;margin:0;">6 programas • 20 proyectos • Haz clic en cada línea para explorar</p>
        </div>
        <div class="grid-2" id="lineasOverview"></div>
    </section>

    <section id="linea1" style="padding-top:20px;"></section>
    <section id="linea2" style="padding-top:12px;"></section>
    <section id="linea3" style="padding-top:12px;"></section>
    <section id="linea4" style="padding-top:12px;"></section>

    <!-- METAS 2035 -->
    <section id="metas" style="padding-top:20px;">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#2D8A4E,#5DB87A);"><i class="fas fa-chart-line"></i></div>
                <div class="sec-info"><h2>Metas Globales 2035</h2><p>Indicadores estratégicos</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner">
                    <div class="tab-group" data-tabgroup="metas">
                        <div class="tabs">
                            <button class="tab-btn active" data-tab="m-acc">📊 Acceso</button>
                            <button class="tab-btn" data-tab="m-cal">⭐ Calidad</button>
                            <button class="tab-btn" data-tab="m-per">🎯 Pertinencia</button>
                            <button class="tab-btn" data-tab="m-inf">🏗️ Infraestructura</button>
                            <button class="tab-btn" data-tab="m-sos">🌿 Sostenibilidad</button>
                        </div>
                        <div id="m-acc" class="tab-panel active">
                            <div class="meta-item"><span class="meta-label">Tasa neta de cobertura</span><span class="meta-value" style="background:#EFF8F2;color:#1E5F36;">98%</span></div>
                            <div class="meta-item"><span class="meta-label">Tasa de permanencia (deserción)</span><span class="meta-value" style="background:#EFF8F2;color:#1E5F36;">≤ 2%</span></div>
                            <div class="meta-item"><span class="meta-label">Veredas con oferta completa</span><span class="meta-value" style="background:#EFF8F2;color:#1E5F36;">100%</span></div>
                            <div class="meta-item"><span class="meta-label">Atención diferencial</span><span class="meta-value" style="background:#EFF8F2;color:#1E5F36;">100%</span></div>
                        </div>
                        <div id="m-cal" class="tab-panel">
                            <div class="meta-item"><span class="meta-label">Puntaje promedio Saber 11</span><span class="meta-value" style="background:#E0F9FC;color:#0891B2;">≥ 300</span></div>
                            <div class="meta-item"><span class="meta-label">Docentes con posgrado</span><span class="meta-value" style="background:#E0F9FC;color:#0891B2;">80%</span></div>
                            <div class="meta-item"><span class="meta-label">Satisfacción con calidad</span><span class="meta-value" style="background:#E0F9FC;color:#0891B2;">≥ 90%</span></div>
                            <div class="meta-item"><span class="meta-label">Proyectos de innovación anuales</span><span class="meta-value" style="background:#E0F9FC;color:#0891B2;">≥ 20</span></div>
                        </div>
                        <div id="m-per" class="tab-panel">
                            <div class="meta-item"><span class="meta-label">PEI actualizados</span><span class="meta-value" style="background:#FFF3D6;color:#5A3A10;">100%</span></div>
                            <div class="meta-item"><span class="meta-label">Estudiantes de media en proyectos productivos</span><span class="meta-value" style="background:#FFF3D6;color:#5A3A10;">80%</span></div>
                        </div>
                        <div id="m-inf" class="tab-panel">
                            <div class="meta-item"><span class="meta-label">Sedes con infraestructura adecuada</span><span class="meta-value" style="background:#f3e8ff;color:#6b21a8;">100%</span></div>
                            <div class="meta-item"><span class="meta-label">Ratio estudiante-computador</span><span class="meta-value" style="background:#f3e8ff;color:#6b21a8;">≤ 3:1</span></div>
                            <div class="meta-item"><span class="meta-label">Conectividad a internet en sedes</span><span class="meta-value" style="background:#f3e8ff;color:#6b21a8;">100%</span></div>
                        </div>
                        <div id="m-sos" class="tab-panel">
                            <div class="meta-item"><span class="meta-label">Instituciones con eficiencia energética</span><span class="meta-value" style="background:#ccfbf1;color:#134e4a;">100%</span></div>
                            <div class="meta-item"><span class="meta-label">Inversión educativa vs presupuesto</span><span class="meta-value" style="background:#ccfbf1;color:#134e4a;">≥ 20%</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SEGUIMIENTO -->
    <section id="seguimiento" style="padding-top:12px;">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#8B52B0,#B88DD4);"><i class="fas fa-clipboard-check"></i></div>
                <div class="sec-info"><h2>Seguimiento y Evaluación</h2><p>Transparencia, participación y mejora continua</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner">
                    <div class="grid-3">
                        <div style="background:#F3EEF8;border-radius:12px;padding:16px;text-align:center;"><i class="fas fa-tv" style="color:#8B52B0;font-size:22px;margin-bottom:8px;"></i><h4 style="font-size:13px;font-weight:700;color:#1A3344;margin:0 0 4px;">Sistema de Monitoreo</h4><p style="font-size:11px;color:#5A6B82;margin:0;">Tablero actualizado semestralmente</p></div>
                        <div style="background:#F3EEF8;border-radius:12px;padding:16px;text-align:center;"><i class="fas fa-user-friends" style="color:#8B52B0;font-size:22px;margin-bottom:8px;"></i><h4 style="font-size:13px;font-weight:700;color:#1A3344;margin:0 0 4px;">Comités de Seguimiento</h4><p style="font-size:11px;color:#5A6B82;margin:0;">Mesa Municipal y JUME lideran</p></div>
                        <div style="background:#F3EEF8;border-radius:12px;padding:16px;text-align:center;"><i class="fas fa-file-alt" style="color:#8B52B0;font-size:22px;margin-bottom:8px;"></i><h4 style="font-size:13px;font-weight:700;color:#1A3344;margin:0 0 4px;">Informes Anuales</h4><p style="font-size:11px;color:#5A6B82;margin:0;">Presentados al Concejo y comunidad</p></div>
                        <div style="background:#F3EEF8;border-radius:12px;padding:16px;text-align:center;"><i class="fas fa-search" style="color:#8B52B0;font-size:22px;margin-bottom:8px;"></i><h4 style="font-size:13px;font-weight:700;color:#1A3344;margin:0 0 4px;">Evaluaciones Externas</h4><p style="font-size:11px;color:#5A6B82;margin:0;">Cada 3 años por entidad independiente</p></div>
                        <div style="background:#F3EEF8;border-radius:12px;padding:16px;text-align:center;"><i class="fas fa-bullhorn" style="color:#8B52B0;font-size:22px;margin-bottom:8px;"></i><h4 style="font-size:13px;font-weight:700;color:#1A3344;margin:0 0 4px;">Rendición de Cuentas</h4><p style="font-size:11px;color:#5A6B82;margin:0;">Audiencias públicas y foros</p></div>
                        <div style="background:#F3EEF8;border-radius:12px;padding:16px;text-align:center;"><i class="fas fa-sync" style="color:#8B52B0;font-size:22px;margin-bottom:8px;"></i><h4 style="font-size:13px;font-weight:700;color:#1A3344;margin:0 0 4px;">Actualización</h4><p style="font-size:11px;color:#5A6B82;margin:0;">Revisión y ajuste cada 4 años</p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HOJA DE RUTA -->
    <section id="hoja-ruta" style="padding-top:12px;">
        <div class="sec-card">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:linear-gradient(135deg,#C8840A,#F5A820);"><i class="fas fa-map"></i></div>
                <div class="sec-info"><h2>Hoja de Ruta para la Implementación</h2><p>7 pasos • El paso 7 es participación comunitaria</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body">
                <div class="sec-inner" id="hojaRutaSection"></div>
            </div>
        </div>
    </section>

    <!-- NUESTRA PALABRA -->
    <section id="nuestra-palabra" style="padding-top:20px;">
        <div style="background:linear-gradient(135deg,#0B2540 0%,#2D8A4E 100%);border-radius:20px;padding:32px 24px;text-align:center;position:relative;overflow:hidden;">
            <div style="position:absolute;top:-30px;right:-30px;width:150px;height:150px;background:rgba(255,255,255,0.04);border-radius:50%;"></div>
            <div style="position:absolute;bottom:-20px;left:-20px;width:100px;height:100px;background:rgba(52,211,153,0.08);border-radius:50%;"></div>
            <div style="position:relative;z-index:2;">
                <span style="display:inline-flex;align-items:center;gap:6px;background:rgba(52,211,153,0.2);color:#8FD4A8;padding:6px 16px;border-radius:20px;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;margin-bottom:14px;">
                    <i class="fas fa-vote-yea"></i> Paso 7 — Participación Comunitaria
                </span>
                <h2 style="color:#fff;font-size:clamp(1.4rem,4vw,2.2rem);font-weight:900;margin:0 0 8px;">🗳️ Nuestra Palabra</h2>
                <p style="color:#C2E8CF;font-size:clamp(13px,2vw,15px);margin:0 0 6px;">Tu voz construye la agenda educativa de Necoclí</p>
                <p style="color:#8FD4A8;font-size:12px;margin:0 0 24px;max-width:600px;margin-left:auto;margin-right:auto;line-height:1.7;">Padres de familia, docentes, estudiantes y líderes comunitarios: aquí pueden decir qué objetivos del PEM consideran más importantes, más urgentes y más posibles de lograr. Cada respuesta cuenta.</p>
                <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:12px;">
                    <a href="https://dynamizesas.com/pemr/nuestra-palabra.html" style="display:inline-flex;align-items:center;gap:8px;background:#5DB87A;color:#1E5F36;padding:14px 28px;border-radius:14px;font-size:14px;font-weight:800;text-decoration:none;box-shadow:0 6px 20px rgba(52,211,153,0.4);">
                        <i class="fas fa-hand-point-right"></i> ¿Qué necesitamos primero?
                    </a>
                    <a href="https://dynamizesas.com/pemr/territorio.html" style="display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,0.15);color:#fff;padding:14px 28px;border-radius:14px;font-size:14px;font-weight:700;text-decoration:none;backdrop-filter:blur(6px);border:1px solid rgba(255,255,255,0.2);">
                        <i class="fas fa-chart-bar"></i> Lo que dice el territorio
                    </a>
                </div>
                <p style="color:#8FD4A8;font-size:11px;margin:16px 0 0;"><i class="fas fa-lock-open" style="margin-right:4px;"></i> Sin cuenta de Google · Solo nombre, institución y correo</p>
            </div>
        </div>
    </section>

    <footer style="text-align:center;padding:32px 0 16px;">
        <div style="background:#fff;border-radius:20px;padding:24px;box-shadow:0 2px 12px rgba(0,0,0,0.05);">
            <h3 style="font-size:16px;font-weight:800;color:#1A3344;margin:0 0 6px;">📚 Plan Educativo Municipal de Necoclí</h3>
            <p style="font-size:13px;color:#5A6B82;margin:0 0 4px;">2025 – 2035 • Un acuerdo por la calidad y la equidad educativa</p>
            <p style="font-size:11px;color:#94A3B8;margin:0 0 12px;">Secretaría de Educación, Cultura y Deportes • Mesa de Educación Municipal • Fundación Grupo Social</p>
            <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:6px;">
                <span class="badge" style="background:#F0FBFC;color:#0891B2;"><i class="fas fa-map-marker-alt" style="margin-right:4px;"></i>Necoclí, Antioquia</span>
                <span class="badge" style="background:#EFF8F2;color:#1E5F36;"><i class="fas fa-globe" style="margin-right:4px;"></i>Región de Urabá</span>
                <span class="badge" style="background:#F3EEF8;color:#6B3A8A;"><i class="fas fa-users" style="margin-right:4px;"></i>Construcción participativa</span>
            </div>
        </div>
    </footer>
</main>

<div class="float-group">
    <button class="float-btn secondary" onclick="window.print()" title="Imprimir"><i class="fas fa-print"></i></button>
    <button class="float-btn primary" onclick="window.scrollTo({top:0,behavior:'smooth'})" title="Volver arriba"><i class="fas fa-arrow-up"></i></button>
</div>

<script>
// ===================== DATA =====================
const eeData = [
    {name:'I.E. Eduardo Espitia Romero',est:1624,sedes:4,zone:'urban'},
    {name:'I.E. Antonio Roldán Betancur',est:1550,sedes:3,zone:'urban'},
    {name:'I.E.R. El Totumo',est:1539,sedes:8,zone:'rural'},
    {name:'I.E.R. Mulaticos Piedrecitas',est:1196,sedes:26,zone:'rural'},
    {name:'I.E.R. Zapata',est:924,sedes:6,zone:'rural'},
    {name:'I.E.R. Mulatos',est:683,sedes:6,zone:'rural'},
    {name:'I.E.R. Melilto',est:636,sedes:6,zone:'rural'},
    {name:'I.E.R. Caribia',est:631,sedes:7,zone:'rural'},
    {name:'I.E.R. Pueblo Nuevo',est:592,sedes:5,zone:'rural'},
    {name:'I.E.R. San Sebastián de Urabá',est:548,sedes:6,zone:'rural'},
    {name:'I.E.R. La Comarca',est:513,sedes:7,zone:'rural'},
    {name:'I.E.R. Indígena José Elías Suárez',est:496,sedes:6,zone:'indig'},
    {name:'I.E.R. Las Changas',est:492,sedes:8,zone:'rural'},
    {name:'I.E.R. Tulapita',est:434,sedes:8,zone:'rural'},
    {name:'I.E.R. Mello Villavicencio',est:412,sedes:6,zone:'rural'},
    {name:'C.E.R. Bobal La Playa',est:342,sedes:4,zone:'rural'},
    {name:'C.E.R. Vale Pavas',est:166,sedes:3,zone:'rural'},
    {name:'C.E.R. Melilto Arriba',est:161,sedes:3,zone:'rural'},
    {name:'C.E.R. El Paraíso',est:145,sedes:5,zone:'rural'},
];

const timelineData = [
    {phase:'Fase 0',period:'2023–2024',title:'Alistamiento',color:'#0891B2',bg:'#f0fdfa',desc:'Reuniones estratégicas con actores locales, departamentales y aliados.',detail:'Se posicionó la JUME, se establecieron acuerdos con la Administración Municipal y con SEDUCA, y se realizó el relacionamiento con la Fundación Grupo Social.'},
    {phase:'Fase 1',period:'2024',title:'Diagnóstico Participativo',color:'#2563eb',bg:'#F0FBFC',desc:'Cerca de 800 personas participaron. Fuentes primarias y secundarias.',detail:'Docentes, directivos, estudiantes, familias, comunidades étnicas, organizaciones sociales. Triangulación de datos.'},
    {phase:'Fase 2',period:'2024–Jun 2025',title:'Formulación Estratégica',color:'#8B52B0',bg:'#F3EEF8',desc:'Definición de misión, visión, valores, objetivos, líneas, programas, metas e indicadores.',detail:'Trabajo colaborativo del Comité Técnico PEM con la Mesa de Educación Municipal, validación con la comunidad educativa.'},
    {phase:'Fase 3',period:'Jul 2025',title:'Aprobación y Sanción',color:'#C8840A',bg:'#FBF5E8',desc:'Presentación del Proyecto de Acuerdo al Concejo Municipal.',detail:'El PEM se convierte en Acuerdo Municipal, instrumento de política pública con legitimidad jurídica.'},
    {phase:'Fase 4',period:'2025–2035',title:'Financiación, Ejecución y Gestión',color:'#2D8A4E',bg:'#EFF8F2',desc:'Priorización de proyectos, plan de inversiones, gestión de financiamiento.',detail:'Articulación con SGP, cooperación internacional, sector privado y presupuesto municipal.'},
    {phase:'Fase 5',period:'2025–2035',title:'Seguimiento, Evaluación y Sostenibilidad',color:'#dc2626',bg:'#fef2f2',desc:'Sistema de monitoreo con indicadores, informes semestrales, evaluaciones externas.',detail:'Rendición de cuentas, foros educativos, ajuste cada 4 años. Cultura de mejora continua.'},
];

const hojaRutaData = [
    {num:1,emoji:'🗣️',title:'Contar la buena noticia',desc:'Comunicar que el PEM ya es Acuerdo Municipal aprobado.',detail:'Publicar el texto oficial en medios accesibles. Socializar en redes, escuelas, reuniones y medios comunitarios.'},
    {num:2,emoji:'🏛️',title:'Dar fuerza institucional',desc:'Alinear instrumentos de planeación territorial con el PEM.',detail:'Alinear Planes de Desarrollo, Plan Sectorial, Plan Territorial de Formación Docente.'},
    {num:3,emoji:'🧑‍🤝‍🧑',title:'Fortalecer la organización',desc:'Mantener y formalizar el Comité PEM y el Staff Orientadores.',detail:'Establecer reglas de funcionamiento, tiempos de encuentro y mecanismos de seguimiento.'},
    {num:4,emoji:'🛠️',title:'Plan de trabajo concreto',desc:'Diseñar Plan Operativo Anual (POA) 2025–2026.',detail:'Acciones claras, responsables, tiempos, recursos y formas de evaluación.'},
    {num:5,emoji:'🌍',title:'Llevar el PEM a cada institución',desc:'Jornadas de apropiación con docentes, estudiantes y familias.',detail:'Crear versiones visuales, amigables y multilingües. Visitar escuelas rurales y urbanas.'},
    {num:6,emoji:'📊',title:'Monitorear y aprender',desc:'Activar sistema de seguimiento con indicadores definidos.',detail:'Primer corte de avance en diciembre 2025. Informes cada seis meses.'},
    {num:7,emoji:'🗳️',title:'Nuestra palabra',desc:'La comunidad define qué es prioritario: importancia, viabilidad y urgencia de los objetivos del PEM.',detail:'Padres de familia, docentes, estudiantes y líderes comunitarios participan calificando y organizando los proyectos del plan. Sus votos construyen la agenda educativa compartida del municipio. Cada voz cuenta, cada respuesta aporta.'},
];

const objetivosData = [
    {n:1,t:'<strong>Garantizar la oferta educativa</strong> con acceso equitativo y eficiente en cada nivel de formación.'},
    {n:2,t:'<strong>Propender por la calidad educativa</strong> como motor de planeación, formación y evaluación.'},
    {n:3,t:'<strong>Fortalecer la pertinencia</strong> mediante enfoques pedagógicos actualizados y adaptados.'},
    {n:4,t:'<strong>Promover habilidades</strong> para proyectos de vida a través de participación y reflexión crítica.'},
    {n:5,t:'<strong>Mejorar la infraestructura</strong> escolar (física y tecnológica) con criterios de sostenibilidad.'},
    {n:6,t:'<strong>Consolidar gestión educativa</strong> participativa, corresponsable y basada en evidencia.'},
];

const enfoquesData = [
    {title:'Asequibilidad',sub:'Disponibilidad',color:'#2D8A4E',icon:'fas fa-building',bg:'#EFF8F2',desc:'Instituciones, infraestructura y recursos suficientes en todo el territorio.',detail:'Implica garantizar planteles accesibles, con condiciones físicas dignas, personal docente suficiente, materiales pedagógicos adecuados y servicios básicos funcionales.',quote:'"Los Estados deben asegurar que haya suficientes instituciones educativas" — UNESCO, 2008'},
    {title:'Accesibilidad',sub:'Acceso',color:'#2563eb',icon:'fas fa-door-open',bg:'#F0FBFC',desc:'Eliminación de barreras económicas, sociales, culturales y geográficas.',detail:'Ligado al principio de no discriminación: igualdad de oportunidades sin importar género, etnia, discapacidad u origen.',quote:'"La educación debe ser accesible a todos, especialmente a los grupos más vulnerables" — Comité DESC, ONU, 1999'},
    {title:'Adaptabilidad',sub:'Permanencia',color:'#C8840A',icon:'fas fa-puzzle-piece',bg:'#FFFBF0',desc:'La educación se ajusta a necesidades cambiantes del estudiante y su entorno.',detail:'Incluye pertinencia curricular, enfoques pedagógicos diferenciados y acompañamiento a trayectorias educativas diversas.',quote:'"Los contenidos deben ser culturalmente apropiados, pertinentes y capaces de promover la inclusión" — UNESCO-IIEP, 2018'},
    {title:'Aceptabilidad',sub:'Calidad',color:'#dc2626',icon:'fas fa-star',bg:'#fef2f2',desc:'Educación culturalmente adecuada, pedagógicamente sólida y socialmente valorada.',detail:'Involucra calidad en contenidos, métodos, cualificación docente, ambientes seguros y participación comunitaria.',quote:'"Una educación de calidad permite desarrollar plenamente la personalidad humana y la dignidad" — UNESCO, 2015'},
];

const proyectosData = {
    'L1P1': [
        {emoji:'🧒',title:'Tránsitos Seguros – Primera Infancia',purpose:'Garantizar el acceso y la atención integral de niños y niñas en centros de desarrollo infantil.',components:['Adecuación y dotación de espacios seguros','Capacitación docente especializada','Formación a familias','Protocolos de seguridad y bienestar infantil'],indicators:['EE intervenidos','% docentes capacitados','Familias en programas','Tasa de retención','Satisfacción','Protocolos evaluados']},
        {emoji:'♿',title:'Centros de Recursos para la Inclusión',purpose:'Garantizar apoyos especializados para estudiantes con discapacidad.',components:['Espacios accesibles','TIC adaptativas y materiales braille/LSC','Banco de ayudas técnicas','Formación en DUA'],indicators:['Sedes con centro activo','% docentes en DUA','Retención NEE','Satisfacción familias','Ayudas entregadas','Espacios adaptados']},
        {emoji:'🚌',title:'Ruta de Cobertura Rural',purpose:'Llevar y mantener la oferta educativa completa en veredas.',components:['Transporte escolar seguro','Aulas multigrado equipadas','Docentes itinerantes','Modelos flexibles','PAE'],indicators:['Asistencia escolar rural','Reducción sobreedad','Aulas equipadas','Docentes itinerantes','Tutorías virtuales','Satisfacción familias']},
        {emoji:'💡',title:'Habilidades para la Vida',purpose:'Desarrollar competencias socioemocionales y financieras.',components:['Módulos de proyecto de vida','Educación financiera','Mentorías por egresados'],indicators:['% con plan de vida','Continuidad a media/terciaria','Mentorías realizadas','Competencias socioemocionales','Educación financiera','Satisfacción estudiantil']},
        {emoji:'🎓',title:'Puentes a la Educación Terciaria',purpose:'Facilitar ingreso y permanencia en educación superior.',components:['Acompañamiento en inscripción y becas','Alianzas con IES y ETDH','Clubes de lectura crítica'],indicators:['Estudiantes admitidos en IES','Becas gestionadas','Permanencia en ed. superior','% con acompañamiento','Estudiantes en clubes']},
    ],
    'L1P2': [
        {emoji:'👨‍👩‍👧',title:'Acompañamiento a Familias',purpose:'Fortalecer el rol educativo de padres y cuidadores.',components:['Escuela de padres','Atención psicosocial y jurídica','Biblioteca de recursos'],indicators:['Participación de padres','Familias con atención','Uso de biblioteca','Satisfacción familiar','Clima familiar','Estrategias implementadas']},
        {emoji:'🕊️',title:'Educación en Convivencia y Ética',purpose:'Fortalecer relaciones y manejo de conflictos.',components:['Programa Aulas sin Violencia','Mediadores escolares'],indicators:['Disminución de conflictos','Aulas con programa','Mediadores formados','Clima escolar','Prevención de violencia']},
        {emoji:'🤲',title:'Voluntariado y Participación Comunitaria',purpose:'Articular escuela-comunidad para compromiso social.',components:['Plataforma de voluntariado','Alianzas público-privadas','Jornadas de servicio social','Alfabetización'],indicators:['Horas de voluntariado','Número de alianzas','Estudiantes en alfabetización','Jornadas de servicio','Participación en plataforma']},
    ],
    'L2P3': [
        {emoji:'📊',title:'Plan de Mejora Continua',purpose:'Monitorear logros y retroalimentar procesos.',components:['Sistema de datos y tablero BI','Simulacros ICFES trimestrales','Planes de mejora por área'],indicators:['Aumento Saber 11','% acciones cerradas','Simulacros realizados','Tiempo promedio cierre','Satisfacción','Planes por área']},
        {emoji:'👩‍🏫',title:'Formación y Acompañamiento Docente',purpose:'Desarrollar competencias docentes y bienestar.',components:['Diagnóstico de necesidades','Ciclos de formación integral','Comunidades de práctica','Mentores en aula','Reconocimientos e incentivos'],indicators:['Horas capacitación/año','Mejora en prácticas','Aumento Saber 11','Puntajes EGRA/ECMA','Comunidades de práctica','Bienestar docente']},
        {emoji:'🔬',title:'Centro de Innovación Educativa',purpose:'Proveer recursos y cultura de investigación.',components:['Laboratorios STEAM','Repositorio de recursos abiertos','Semilleros de investigación'],indicators:['Proyectos en ferias','Participación semilleros','Recursos disponibles','Satisfacción labs','Capacitaciones investigación']},
        {emoji:'🔭',title:'Dotación Científica',purpose:'Modernizar laboratorios de ciencias.',components:['Laboratorios de química/física','Soporte técnico y formación'],indicators:['Laboratorios modernizados','Docentes capacitados']},
    ],
    'L2P4': [
        {emoji:'🏗️',title:'Plan Maestro de Infraestructura',purpose:'Construir, adecuar y mantener plantas físicas.',components:['Diagnóstico técnico-financiero','Estándares de accesibilidad universal','Gestión de recursos'],indicators:['% planteles nivel ≥ B','Planteles renovados','Inversión en infraestructura','Inversión SGP','Accesibilidad universal','Satisfacción comunidad']},
        {emoji:'💻',title:'Dotación TIC Integral',purpose:'Equipar aulas con tecnología educativa.',components:['Kits de aula digital','Plataforma LMS municipal','Mantenimiento preventivo'],indicators:['Disponibilidad TIC ≥ 95%','Aulas con kits','Docentes usando LMS','Satisfacción TIC']},
        {emoji:'🔧',title:'Laboratorios STEAM',purpose:'Fortalecer ciencias y tecnología.',components:['Labs fijos en sedes urbanas','Laboratorio móvil para veredas','Clubes de robótica y ciencia'],indicators:['Estudiantes en clubes','Labs activos','Proyectos desarrollados','Satisfacción estudiantil']},
        {emoji:'🌿',title:'Alianzas para la Sostenibilidad',purpose:'Asegurar recursos y eficiencia energética.',components:['Convenios con empresas y ONG','Energía solar y agua lluvia','Jornada extendida'],indicators:['Ahorro anual','Convenios activos','Energía renovable','Jornada extendida']},
    ],
    'L3P5': [
        {emoji:'🎭',title:'Cátedra Municipal y Multiculturalidad',purpose:'Integrar identidad local al currículo.',components:['Diseño curricular colaborativo','Materiales multilingües','Salidas pedagógicas al territorio'],indicators:['Docentes aplicando cátedra','Instituciones con cátedra','Sentido de pertenencia','Guías patrimonio','Salidas pedagógicas','Satisfacción']},
        {emoji:'📋',title:'PEI Actualizados y Currículos Contextualizados',purpose:'Adaptar contenidos a realidades locales.',components:['Matrices de pertinencia','Secuencias didácticas','Evaluación por competencias'],indicators:['% asignaturas ajustadas','PEI actualizado','Evaluaciones por competencias','Alineación currículo-PEM','Participación docente']},
        {emoji:'🌳',title:'Aprendizaje en Aulas Abiertas',purpose:'Potenciar el entorno como aula.',components:['Huertas escolares y viveros','Clases en espacios naturales','Salidas pedagógicas'],indicators:['Sesiones fuera del aula','Huertas activas','Participación estudiantil','Competencias ambientales','Satisfacción']},
        {emoji:'🗳️',title:'Gobiernos Escolares y Gestión Pedagógica',purpose:'Fortalecer participación democrática.',components:['Capacitación representantes','Plan de participación','Observatorios estudiantiles'],indicators:['Propuestas implementadas','Estudiantes representantes','Reuniones de consejos','Liderazgo estudiantil','Observatorios']},
        {emoji:'📖',title:'Clubes de Lectura y Pensamiento Crítico',purpose:'Fomentar comprensión lectora y pensamiento crítico.',components:['Clubes temáticos','Guías de análisis crítico','Debates y producción escrita'],indicators:['Clubes activos','Participación promedio','Comprensión lectora','Pensamiento crítico','Satisfacción']},
        {emoji:'🌾',title:'Proyectos Productivos Escolares y Rurales',purpose:'Vincular aprendizaje con emprendimiento.',components:['Huertas, piscicultura, agro-emprendimientos','Feria anual','Articulación con SENA'],indicators:['Proyectos ejecutados','Estudiantes participantes','Ganancias generadas','Articulación SENA','Feria anual']},
    ],
};

const lineasData = [
    {id:'linea1',num:1,title:'Educación para la Equidad y las Trayectorias Completas',subtitle:'Acceso con justicia territorial',color:'#2D8A4E',gradient:'linear-gradient(135deg,#2D8A4E,#5DB87A)',bgClass:'l1-bg',icon:'fas fa-users',emoji:'🤝',programs:[{name:'P1: Acceso y Equidad Educativa',key:'L1P1',obj:'Garantizar acceso equitativo.'},{name:'P2: Desarrollo Personal, Familiar y Comunitario',key:'L1P2',obj:'Promover habilidades para la vida.'}],tagClass:'green'},
    {id:'linea2',num:2,title:'Calidad Educativa con Innovación y Sostenibilidad',subtitle:'Ambientes que inspiran, docentes que transforman',color:'#2563eb',gradient:'linear-gradient(135deg,#2563eb,#05C2D8)',bgClass:'l2-bg',icon:'fas fa-lightbulb',emoji:'💡',programs:[{name:'P3: Calidad, Innovación y Mejora Continua',key:'L2P3',obj:'Calidad como motor de innovación.'},{name:'P4: Infraestructura y Recursos',key:'L2P4',obj:'Infraestructura escolar sostenible.'}],tagClass:''},
    {id:'linea3',num:3,title:'Educación con Identidad y Pertinencia Territorial',subtitle:'Aprender desde el territorio',color:'#ca8a04',gradient:'linear-gradient(135deg,#ca8a04,#F5A820)',bgClass:'l3-bg',icon:'fas fa-seedling',emoji:'🌱',programs:[{name:'P5: Pertinencia y Contextualización Educativa',key:'L3P5',obj:'Pertinencia con enfoques contextualizados.'}],tagClass:'yellow'},
    {id:'linea4',num:4,title:'Gestión Educativa Participativa y con Gobernanza',subtitle:'Decidir juntos, con información',color:'#db2777',gradient:'linear-gradient(135deg,#db2777,#E8756A)',bgClass:'l4-bg',icon:'fas fa-handshake',emoji:'🏛️',programs:[],tagClass:'pink'},
];

const searchIndex = [
    {t:'Presentación del Alcalde',s:'presentacion',k:'presentación alcalde cardona territorio',cat:'Fundamentos'},
    {t:'Misión',s:'mision-vision',k:'misión sistema educativo innovador',cat:'Fundamentos'},
    {t:'Visión 2036',s:'mision-vision',k:'visión 2036 referente cobertura',cat:'Fundamentos'},
    {t:'Valores del PEM',s:'valores',k:'valores colaboración sostenible identidad cultural',cat:'Fundamentos'},
    {t:'Objetivos Estratégicos',s:'objetivos',k:'objetivos acceso calidad pertinencia',cat:'Fundamentos'},
    {t:'Enfoque de Derechos (4A)',s:'enfoques',k:'enfoques derechos asequibilidad accesibilidad adaptabilidad aceptabilidad tomasevski',cat:'Fundamentos'},
    {t:'Marco Normativo',s:'referentes',k:'ley norma constitución ODS internacional nacional',cat:'Normativo'},
    {t:'Ruta Metodológica',s:'ruta',k:'ruta metodológica fases alistamiento diagnóstico formulación',cat:'Metodología'},
    {t:'Contexto Municipal',s:'contexto',k:'contexto demografía economía pobreza migración darién servicios',cat:'Contexto'},
    {t:'Contexto Educativo',s:'contexto-edu',k:'establecimientos educativos matrícula sedes docentes',cat:'Contexto'},
    {t:'Diagnóstico Educativo',s:'diagnostico',k:'diagnóstico problemáticas potencialidades desafíos',cat:'Diagnóstico'},
    {t:'Líneas Estratégicas',s:'lineas',k:'líneas estratégicas programas proyectos',cat:'Estrategia'},
    {t:'Línea 1: Equidad',s:'linea1',k:'equidad trayectorias acceso primera infancia inclusión rural',cat:'L1'},
    {t:'Línea 2: Calidad',s:'linea2',k:'calidad innovación mejora docente formación TIC infraestructura',cat:'L2'},
    {t:'Línea 3: Identidad',s:'linea3',k:'identidad pertinencia cátedra PEI currículo',cat:'L3'},
    {t:'Línea 4: Gobernanza',s:'linea4',k:'gobernanza gestión participativa mesa JUME',cat:'L4'},
    {t:'Metas 2035',s:'metas',k:'metas indicadores 2035 cobertura deserción saber',cat:'Metas'},
    {t:'Seguimiento',s:'seguimiento',k:'seguimiento evaluación monitoreo comités informes',cat:'Seguimiento'},
    {t:'Nuestra Palabra – Participación',s:'nuestra-palabra',k:'nuestra palabra participación comunitaria votación prioridad',cat:'Participación'},
    {t:'Hoja de Ruta',s:'hoja-ruta',k:'hoja ruta implementación pasos comunicar alianzas',cat:'Implementación'},
    {t:'Primera Infancia',s:'linea1',k:'primera infancia tránsitos seguros niños',cat:'Proyecto'},
    {t:'Inclusión Educativa',s:'linea1',k:'inclusión discapacidad DUA braille',cat:'Proyecto'},
    {t:'Formación Docente',s:'linea2',k:'formación docente capacitación TIC',cat:'Proyecto'},
    {t:'Dotación TIC',s:'linea2',k:'TIC computador LMS aula digital',cat:'Proyecto'},
    {t:'Cátedra Municipal',s:'linea3',k:'cátedra municipal multiculturalidad identidad',cat:'Proyecto'},
    {t:'Proyectos Productivos',s:'linea3',k:'proyectos productivos emprendimiento SENA',cat:'Proyecto'},
];

// ===================== RENDER FUNCTIONS =====================
function renderObjetivos(){
    document.getElementById('objSection').innerHTML = objetivosData.map(o=>`
        <div class="obj-card" style="background:#FBF5E8;border-radius:12px;margin-bottom:6px;">
            <div class="obj-num" style="background:linear-gradient(135deg,#C8840A,#F5A820);">${o.n}</div>
            <p>${o.t}</p>
        </div>
    `).join('');
}

function renderEnfoques(){
    document.getElementById('enfoquesSection').innerHTML = `
        <p style="font-size:13px;color:#5A6B82;line-height:1.7;margin-bottom:16px;">Basado en <strong>Katarina Tomaševski</strong>, primera Relatora Especial de la ONU sobre el derecho a la educación. Haz clic en cada enfoque para más detalles:</p>
        <div class="grid-2">${enfoquesData.map(e=>`
            <div class="enfoque-card" style="border-color:${e.color};" onclick="toggleEnfoque(this)">
                <h4 style="font-size:14px;font-weight:700;color:${e.color};margin:0;display:flex;align-items:center;gap:6px;"><i class="${e.icon}" style="color:${e.color};"></i> ${e.title} <span style="font-weight:400;color:#94A3B8;font-size:11px;">(${e.sub})</span></h4>
                <p style="font-size:12px;color:#5A6B82;margin:6px 0 0;line-height:1.5;">${e.desc}</p>
                <div class="enfoque-toggle"><i class="fas fa-plus-circle"></i> <span>Ver más</span></div>
                <div class="enfoque-expand"><div style="margin-top:10px;padding:12px;background:${e.bg};border-radius:10px;font-size:11px;color:#2A4560;line-height:1.6;">
                    <p style="margin:0;">${e.detail}</p>
                    <p style="margin:8px 0 0;font-style:italic;color:#5A6B82;">${e.quote}</p>
                </div></div>
            </div>
        `).join('')}</div>
    `;
}

function renderTimeline(){
    document.getElementById('timelineSection').innerHTML=timelineData.map((t,i)=>`
        <div class="timeline-item">
            <div class="timeline-dot" style="background:${t.color};font-size:9px;">${i}</div>
            <div class="timeline-box" style="background:${t.bg};" onclick="this.classList.toggle('expanded')">
                <span class="badge" style="background:${t.color}20;color:${t.color};margin-bottom:6px;">${t.phase} • ${t.period}</span>
                <h4 style="font-size:14px;font-weight:700;color:#1A3344;margin:0 0 4px;">${t.title}</h4>
                <p style="font-size:12px;color:#5A6B82;margin:0;line-height:1.6;">${t.desc}</p>
                <div style="font-size:10px;color:#94A3B8;margin-top:6px;display:flex;align-items:center;gap:4px;"><i class="fas fa-plus-circle"></i> Ver detalle</div>
                <div class="detail"><p style="margin:10px 0 0;font-size:11px;color:#5A6B82;line-height:1.6;padding:10px;background:rgba(255,255,255,0.6);border-radius:8px;">${t.detail}</p></div>
            </div>
        </div>
    `).join('');
}

function renderEETable(){
    const b=document.getElementById('eeTableBody');
    const zoneMap={rural:['Rural','zone-rural'],urban:['Urbana-Rural','zone-urban'],indig:['Rural-Indígena','zone-indig']};
    b.innerHTML=eeData.map(e=>{
        const z=zoneMap[e.zone];
        return `<tr><td>${e.name}</td><td>${e.est>1500?'<strong>'+e.est+'</strong>':e.est}</td><td>${e.sedes>10?'<strong>'+e.sedes+'</strong>':e.sedes}</td><td><span class="zone-badge ${z[1]}">${z[0]}</span></td></tr>`;
    }).join('');
}

function renderLineasOverview(){
    document.getElementById('lineasOverview').innerHTML=lineasData.map(l=>{
        const progs=l.programs.map(p=>`<span class="proy-tag ${l.tagClass}">${p.name}</span>`).join('');
        return `<a href="#${l.id}" class="linea-overview ${l.bgClass}">
            <i class="fas fa-arrow-right linea-arrow"></i>
            <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
                <span style="font-size:24px;">${l.emoji}</span>
                <div><span class="badge" style="background:${l.color}20;color:${l.color};font-size:10px;">Línea ${l.num}</span>
                <h3 style="font-size:14px;font-weight:700;color:#1A3344;margin:2px 0 0;">${l.title}</h3></div>
            </div>
            <p style="font-size:11px;color:#5A6B82;margin:0 0 8px;">${l.subtitle}</p>
            <div class="proy-tags">${progs||'<span class="proy-tag '+l.tagClass+'">Transversal: Gobernanza y Monitoreo</span>'}</div>
        </a>`;
    }).join('');
}

function renderLineaSection(l){
    const sec=document.getElementById(l.id);
    if(l.programs.length===0){
        sec.innerHTML=`<div class="sec-card" style="border-top:4px solid ${l.color};">
            <div class="sec-head" onclick="toggleSec(this)">
                <div class="sec-icon" style="background:${l.gradient};"><i class="${l.icon}"></i></div>
                <div class="sec-info"><h2>Línea ${l.num}: ${l.title}</h2><p>${l.subtitle}</p></div>
                <i class="fas fa-chevron-down sec-chevron"></i>
            </div>
            <div class="sec-body"><div class="sec-inner">
                <p style="font-size:13px;color:#5A6B82;line-height:1.7;margin-bottom:16px;">Consolidar una gestión educativa participativa, corresponsable y basada en evidencia.</p>
                <div class="grid-3">
                    <div style="background:#FFF5F4;border-radius:12px;padding:16px;text-align:center;"><i class="fas fa-users" style="color:#db2777;font-size:22px;margin-bottom:8px;"></i><h4 style="font-size:13px;font-weight:700;margin:0 0 4px;">Mesa de Educación,SEDUCA y JUME</h4><p style="font-size:11px;color:#5A6B82;margin:0;">Gobernanza y articulación</p></div>
                    <div style="background:#FFF5F4;border-radius:12px;padding:16px;text-align:center;"><i class="fas fa-database" style="color:#db2777;font-size:22px;margin-bottom:8px;"></i><h4 style="font-size:13px;font-weight:700;margin:0 0 4px;">Sistemas de Información</h4><p style="font-size:11px;color:#5A6B82;margin:0;">Tableros de control e indicadores</p></div>
                    <div style="background:#FFF5F4;border-radius:12px;padding:16px;text-align:center;"><i class="fas fa-comments" style="color:#db2777;font-size:22px;margin-bottom:8px;"></i><h4 style="font-size:13px;font-weight:700;margin:0 0 4px;">Participación Comunitaria</h4><p style="font-size:11px;color:#5A6B82;margin:0;">Rendición de cuentas y foros</p></div>
                </div>
            </div></div>
        </div>`;
        return;
    }
    let programsHTML='';
    l.programs.forEach(p=>{
        const proys=proyectosData[p.key]||[];
        const proysHTML=proys.map(pr=>{
            const safeTitle=pr.title.replace(/'/g,"\\'");
            return `
            <div class="proy-item">
                <div class="proy-head" onclick="toggleProy(this)">
                    <span class="emoji">${pr.emoji}</span>
                    <span class="title">${pr.title}</span>
                    <i class="fas fa-plus toggle-icon"></i>
                </div>
                <div class="proy-body">
                    <div class="proy-inner">
                        <div class="proy-section"><h5><i class="fas fa-crosshairs"></i> Propósito</h5><p>${pr.purpose}</p></div>
                        <div class="proy-section"><h5><i class="fas fa-puzzle-piece"></i> Componentes</h5><div class="proy-tags">${pr.components.map(c=>`<span class="proy-tag ${l.tagClass}">${c}</span>`).join('')}</div></div>
                        <div class="proy-section"><h5><i class="fas fa-chart-bar"></i> Indicadores</h5><div class="proy-tags">${pr.indicators.map(ind=>`<span class="proy-tag">${ind}</span>`).join('')}</div></div>
                        <button onclick="event.stopPropagation();openProjectDetail('${safeTitle}','${p.key}')" style="margin-top:10px;background:${l.color}15;color:${l.color};border:1px solid ${l.color}40;border-radius:8px;padding:8px 16px;font-size:11px;font-weight:600;cursor:pointer;"><i class="fas fa-expand-alt" style="margin-right:4px;"></i> Ver completo</button>
                    </div>
                </div>
            </div>`;
        }).join('');
        programsHTML+=`
            <div style="background:${l.color}08;border-radius:14px;padding:16px;margin-bottom:16px;border-left:4px solid ${l.color};">
                <h4 style="font-size:14px;font-weight:700;color:${l.color};margin:0 0 4px;">${p.name}</h4>
                <p style="font-size:11px;color:#5A6B82;margin:0;">${p.obj}</p>
            </div>
            <div style="margin-bottom:20px;">${proysHTML}</div>
        `;
    });
    const totalProys=l.programs.reduce((a,p)=>(proyectosData[p.key]||[]).length+a,0);
    sec.innerHTML=`<div class="sec-card" style="border-top:4px solid ${l.color};">
        <div class="sec-head" onclick="toggleSec(this)">
            <div class="sec-icon" style="background:${l.gradient};"><i class="${l.icon}"></i></div>
            <div class="sec-info"><h2>Línea ${l.num}: ${l.title}</h2><p>${l.programs.length} Programa${l.programs.length>1?'s':''} • ${totalProys} Proyectos</p></div>
            <i class="fas fa-chevron-down sec-chevron"></i>
        </div>
        <div class="sec-body"><div class="sec-inner">${programsHTML}</div></div>
    </div>`;
}

function renderHojaRuta(){
    document.getElementById('hojaRutaSection').innerHTML=hojaRutaData.map((s,i)=>{
        const isNuestraPalabra = i === hojaRutaData.length - 1;
        if(isNuestraPalabra){
            return `<div id="nuestra-palabra-step" style="background:linear-gradient(135deg,#EFF8F2,#EFF8F2);border-radius:14px;padding:20px;border:2px solid #5DB87A;margin-bottom:4px;">
                <div style="display:flex;gap:14px;align-items:flex-start;">
                    <div class="step-num" style="background:linear-gradient(135deg,#2D8A4E,#5DB87A);flex-shrink:0;">${s.num}</div>
                    <div style="flex:1;">
                        <h4 style="font-size:15px;font-weight:800;color:#1E5F36;margin:0;">${s.emoji} ${s.title}</h4>
                        <p style="font-size:13px;color:#1E5F36;margin:6px 0;line-height:1.6;">${s.desc}</p>
                        <p style="font-size:11px;color:#2D8A4E;margin:0 0 16px;line-height:1.6;">${s.detail}</p>
                        <div style="display:flex;flex-wrap:wrap;gap:10px;">
                            <a href="https://dynamizesas.com/pemr/nuestra-palabra.html" style="display:inline-flex;align-items:center;gap:8px;background:#2D8A4E;color:#fff;padding:12px 22px;border-radius:12px;font-size:13px;font-weight:700;text-decoration:none;box-shadow:0 4px 12px rgba(5,150,105,0.3);">
                                <i class="fas fa-vote-yea"></i> ¿Qué necesitamos primero?
                            </a>
                            <a href="https://dynamizesas.com/pemr/territorio.html" style="display:inline-flex;align-items:center;gap:8px;background:#0891B2;color:#fff;padding:12px 22px;border-radius:12px;font-size:13px;font-weight:700;text-decoration:none;box-shadow:0 4px 12px rgba(3,105,161,0.3);">
                                <i class="fas fa-chart-bar"></i> Lo que dice el territorio
                            </a>
                        </div>
                    </div>
                </div>
            </div>`;
        }
        return `<div class="step-card" onclick="this.classList.toggle('expanded')">
            <div class="step-num" style="background:linear-gradient(135deg,#C8840A,#F5A820);">${s.num}</div>
            <div style="flex:1;">
                <h4 style="font-size:14px;font-weight:700;color:#1A3344;margin:0;">${s.emoji} ${s.title}</h4>
                <p style="font-size:12px;color:#5A6B82;margin:4px 0 0;line-height:1.5;">${s.desc}</p>
                <div style="font-size:10px;color:#94A3B8;margin-top:4px;"><i class="fas fa-plus-circle"></i> Ver detalle</div>
                <div class="detail"><p style="font-size:11px;color:#5A6B82;line-height:1.6;padding:10px;background:#FBF5E8;border-radius:8px;">${s.detail}</p></div>
            </div>
        </div>`;
    }).join('')+`<div style="background:#FFF3D6;border-radius:14px;padding:16px;text-align:center;margin-top:12px;">
        <p style="font-size:13px;font-weight:700;color:#9B6030;margin:0;">✨ El PEM es más que un documento: es un compromiso colectivo.</p>
    </div>`;
}

// ===================== INTERACTIONS =====================
function toggleSidebar(){
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('sidebarOverlay').classList.toggle('open');
}

function goTo(e,id){
    e.preventDefault();
    toggleSidebar();
    const el=document.getElementById(id);
    if(el){
        if(id==='nuestra-palabra'){
            setTimeout(()=>{el.scrollIntoView({behavior:'smooth',block:'start'});},350);
            return;
        }
        const secHead=el.querySelector('.sec-head');
        if(secHead){
            const body=secHead.nextElementSibling;
            if(body&&!body.classList.contains('open')){
                body.classList.add('open');
                secHead.querySelector('.sec-chevron').classList.add('open');
            }
        }
        setTimeout(()=>el.scrollIntoView({behavior:'smooth',block:'start'}),300);
    }
}

function toggleSec(head){
    const body=head.nextElementSibling;
    const chev=head.querySelector('.sec-chevron');
    body.classList.toggle('open');
    chev.classList.toggle('open');
}

function toggleProy(head){
    const body=head.nextElementSibling;
    const icon=head.querySelector('.toggle-icon');
    body.classList.toggle('open');
    icon.classList.toggle('open');
}

function toggleEnfoque(card){
    card.classList.toggle('expanded');
    const toggle=card.querySelector('.enfoque-toggle');
    if(toggle){
        const icon=toggle.querySelector('i');
        const txt=toggle.querySelector('span');
        if(card.classList.contains('expanded')){
            icon.className='fas fa-minus-circle';
            txt.textContent='Ver menos';
        }else{
            icon.className='fas fa-plus-circle';
            txt.textContent='Ver más';
        }
    }
}

// ===== FIXED TAB SYSTEM =====
document.addEventListener('click', function(e) {
    const btn = e.target.closest('.tab-btn');
    if (!btn) return;
    
    const tabGroup = btn.closest('.tab-group');
    if (!tabGroup) return;
    
    const targetId = btn.getAttribute('data-tab');
    if (!targetId) return;
    
    // Deactivate all buttons in this group
    tabGroup.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    // Deactivate all panels in this group
    tabGroup.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    
    // Activate clicked button
    btn.classList.add('active');
    
    // Activate target panel
    const targetPanel = document.getElementById(targetId);
    if (targetPanel) {
        targetPanel.classList.add('active');
    }
});

// SEARCH
function openSearch(){document.getElementById('searchModal').classList.add('open');setTimeout(()=>document.getElementById('searchInput').focus(),100);}
function closeSearch(){document.getElementById('searchModal').classList.remove('open');document.getElementById('searchInput').value='';document.getElementById('searchResults').innerHTML='<p style="color:#94A3B8;font-size:13px;text-align:center;padding:20px;">Escribe al menos 2 caracteres para buscar</p>';}
function doSearch(){
    const q=document.getElementById('searchInput').value.toLowerCase().trim();
    const r=document.getElementById('searchResults');
    if(q.length<2){r.innerHTML='<p style="color:#94A3B8;font-size:13px;text-align:center;padding:20px;">Escribe al menos 2 caracteres...</p>';return;}
    const matches=searchIndex.filter(i=>i.t.toLowerCase().includes(q)||i.k.toLowerCase().includes(q));
    if(!matches.length){r.innerHTML='<p style="color:#94A3B8;font-size:13px;text-align:center;padding:20px;">No se encontraron resultados para "'+q+'"</p>';return;}
    r.innerHTML=matches.map(m=>`<div class="search-item" onclick="closeSearch();document.getElementById('${m.s}').scrollIntoView({behavior:'smooth'})"><i class="fas fa-arrow-right"></i><span>${m.t}</span><span class="cat">${m.cat}</span></div>`).join('');
}

// COMITE
function openComite(){document.getElementById('comiteModal').classList.add('open');}
function closeComite(){document.getElementById('comiteModal').classList.remove('open');}

// DETAIL MODAL
function openProjectDetail(title,key){
    const proys=proyectosData[key]||[];
    const proy=proys.find(p=>p.title===title);
    if(!proy)return;
    document.getElementById('detailTitle').textContent=proy.emoji+' '+proy.title;
    document.getElementById('detailBody').innerHTML=`
        <div style="margin-bottom:20px;">
            <h4 style="font-size:12px;font-weight:700;color:#0891B2;text-transform:uppercase;letter-spacing:.5px;margin:0 0 8px;"><i class="fas fa-crosshairs" style="margin-right:4px;"></i> Propósito</h4>
            <p style="font-size:14px;color:#2A4560;line-height:1.7;margin:0;">${proy.purpose}</p>
        </div>
        <div style="margin-bottom:20px;">
            <h4 style="font-size:12px;font-weight:700;color:#0891B2;text-transform:uppercase;letter-spacing:.5px;margin:0 0 10px;"><i class="fas fa-puzzle-piece" style="margin-right:4px;"></i> Componentes Clave</h4>
            <div style="display:grid;gap:8px;">${proy.components.map(c=>`<div style="background:#F0FBFC;border-radius:10px;padding:12px;font-size:13px;color:#2A4560;display:flex;align-items:center;gap:8px;"><i class="fas fa-check" style="color:#05C2D8;flex-shrink:0;"></i>${c}</div>`).join('')}</div>
        </div>
        <div>
            <h4 style="font-size:12px;font-weight:700;color:#0891B2;text-transform:uppercase;letter-spacing:.5px;margin:0 0 10px;"><i class="fas fa-chart-bar" style="margin-right:4px;"></i> Indicadores</h4>
            <div style="display:grid;gap:6px;">${proy.indicators.map((ind,i)=>`<div style="display:flex;align-items:center;gap:10px;padding:10px;background:#F5F4EF;border-radius:8px;"><span style="background:#0891B2;color:#fff;width:24px;height:24px;border-radius:6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;flex-shrink:0;">${i+1}</span><span style="font-size:12px;color:#2A4560;">${ind}</span></div>`).join('')}</div>
        </div>
    `;
    document.getElementById('detailModal').classList.add('open');
}
function closeDetail(){document.getElementById('detailModal').classList.remove('open');}

// ANIMATED STATS
function animateCount(id,target,suffix){
    suffix=suffix||'';
    const el=document.getElementById(id);
    let current=0;
    const step=Math.ceil(target/60);
    const interval=setInterval(()=>{
        current+=step;
        if(current>=target){current=target;clearInterval(interval);}
        el.textContent=current.toLocaleString()+suffix;
    },25);
}

// KEYBOARD
document.addEventListener('keydown',e=>{
    if(e.key==='Escape'){closeSearch();closeComite();closeDetail();}
    if((e.ctrlKey||e.metaKey)&&e.key==='k'){e.preventDefault();openSearch();}
});

// Close modals on overlay click
document.getElementById('searchModal').addEventListener('click',function(e){if(e.target===this)closeSearch();});
document.getElementById('comiteModal').addEventListener('click',function(e){if(e.target===this)closeComite();});
document.getElementById('detailModal').addEventListener('click',function(e){if(e.target===this)closeDetail();});

// INIT
document.addEventListener('DOMContentLoaded',()=>{
    renderObjetivos();
    renderEnfoques();
    renderTimeline();
    renderEETable();
    renderLineasOverview();
    lineasData.forEach(renderLineaSection);
    renderHojaRuta();
    
    const observer=new IntersectionObserver((entries)=>{
        entries.forEach(entry=>{
            if(entry.isIntersecting){
                animateCount('animStat1',13301);
                animateCount('animStat2',19);
                animateCount('animStat3',550,'+');
                animateCount('animStat4',127);
                observer.disconnect();
            }
        });
    },{threshold:0.3});
    const statsEl=document.querySelector('.stats-bar');
    if(statsEl)observer.observe(statsEl);
});
</script>
</body>
</html>