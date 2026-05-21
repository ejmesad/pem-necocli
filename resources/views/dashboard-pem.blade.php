<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard PEM Necoclí 2025-2035</title>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
*{margin:0;padding:0;box-sizing:border-box;font-family:'Inter',sans-serif}
body{background:#f0f2f5;color:#333}
.sidebar{width:260px;min-height:100vh;background:linear-gradient(180deg,#1e3a5f 0%,#0d1b2a 100%);position:fixed;left:0;top:0;z-index:50;transition:transform .3s}
.main-content{margin-left:260px;transition:margin-left .3s;min-height:100vh}
.nav-item{padding:12px 20px;color:#a8c6df;cursor:pointer;display:flex;align-items:center;gap:12px;transition:all .2s;border-left:3px solid transparent;font-size:14px}
.nav-item:hover,.nav-item.active{background:rgba(255,255,255,.08);color:#fff;border-left-color:#e9c46a}
.nav-item i{width:20px;text-align:center}
.card{background:#fff;border-radius:12px;box-shadow:0 1px 3px rgba(0,0,0,.08);padding:20px;margin-bottom:16px}
.kpi-card{background:#fff;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,.06);padding:20px;text-align:center;border-top:4px solid #1e3a5f}
.kpi-card .value{font-size:2rem;font-weight:800;color:#1e3a5f}
.kpi-card .label{font-size:.78rem;color:#666;margin-top:4px;text-transform:uppercase;letter-spacing:.5px}
.progress-bar{height:10px;background:#e9ecef;border-radius:5px;overflow:hidden}
.progress-fill{height:100%;border-radius:5px;transition:width .6s ease}
.badge{display:inline-block;padding:3px 10px;border-radius:12px;font-size:11px;font-weight:600}
.badge-green{background:#d4edda;color:#155724}
.badge-yellow{background:#fff3cd;color:#856404}
.badge-red{background:#f8d7da;color:#721c24}
.badge-blue{background:#d1ecf1;color:#0c5460}
table{width:100%;border-collapse:collapse}
th{background:#f8f9fa;padding:10px 12px;text-align:left;font-size:12px;font-weight:600;color:#555;text-transform:uppercase;border-bottom:2px solid #dee2e6}
td{padding:10px 12px;border-bottom:1px solid #eee;font-size:13px}
tr:hover{background:#f8f9fa}
.page{display:none}.page.active{display:block}
.modal-overlay{position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,.5);z-index:100;display:none;align-items:center;justify-content:center}
.modal-overlay.show{display:flex}
.modal{background:#fff;border-radius:16px;padding:30px;max-width:700px;width:95%;max-height:85vh;overflow-y:auto}
.btn{padding:8px 20px;border:none;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;transition:all .2s}
.btn-primary{background:#1e3a5f;color:#fff}.btn-primary:hover{background:#2d4a6f}
.btn-success{background:#2d6a4f;color:#fff}.btn-success:hover{background:#3d8a6f}
.btn-outline{background:transparent;border:1px solid #ddd;color:#555}.btn-outline:hover{background:#f8f9fa}
select,input[type="number"]{padding:8px 12px;border:1px solid #ddd;border-radius:8px;font-size:13px;width:100%}
.hamburger{display:none;position:fixed;top:15px;left:15px;z-index:60;background:#1e3a5f;color:#fff;border:none;border-radius:8px;width:40px;height:40px;cursor:pointer;font-size:18px}
@media(max-width:768px){.sidebar{transform:translateX(-260px)}.sidebar.open{transform:translateX(0)}.main-content{margin-left:0!important}.hamburger{display:flex;align-items:center;justify-content:center}}
.animate-in{animation:fadeIn .4s ease}
@keyframes fadeIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
.line-badge{display:inline-flex;align-items:center;gap:6px;padding:4px 12px;border-radius:20px;font-size:12px;font-weight:700}
</style>
</head>
<body>

<button class="hamburger" onclick="document.getElementById('sidebar').classList.toggle('open')"><i class="fas fa-bars"></i></button>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
  <div style="padding:20px;border-bottom:1px solid rgba(255,255,255,.1)">
    <div style="display:flex;align-items:center;gap:10px">
      <div style="width:40px;height:40px;background:#e9c46a;border-radius:10px;display:flex;align-items:center;justify-content:center;font-weight:800;color:#1e3a5f;font-size:16px">N</div>
      <div><div style="color:#fff;font-weight:700;font-size:15px">PEM Necoclí</div><div style="color:#a8c6df;font-size:11px">2025 – 2035</div></div>
    </div>
  </div>
  <div style="padding:10px 0">
    <div class="nav-item active" onclick="showPage('overview',this)"><i class="fas fa-chart-pie"></i>Panel General</div>
    <div class="nav-item" onclick="showPage('lines',this)"><i class="fas fa-layer-group"></i>Líneas Estratégicas</div>
    <div class="nav-item" onclick="showPage('programs',this)"><i class="fas fa-project-diagram"></i>Programas</div>
    <div class="nav-item" onclick="showPage('projects',this)"><i class="fas fa-tasks"></i>Proyectos Articuladores</div>
    <div class="nav-item" onclick="showPage('institutions',this)"><i class="fas fa-school"></i>Instituciones Educativas</div>
    <div class="nav-item" onclick="showPage('components',this)"><i class="fas fa-puzzle-piece"></i>Componentes</div>
    <div class="nav-item" onclick="showPage('icepem',this)"><i class="fas fa-gauge-high"></i>ICE-PEM</div>
    <div class="nav-item" onclick="showPage('timeline',this)"><i class="fas fa-calendar-alt"></i>Cronograma</div>
    <div class="nav-item" onclick="showPage('dataentry',this)"><i class="fas fa-edit"></i>Registro de Avances</div>
  </div>
  <div style="padding:15px 20px;border-top:1px solid rgba(255,255,255,.1);position:absolute;bottom:0;width:100%">
    <div style="color:#a8c6df;font-size:11px"><i class="fas fa-info-circle"></i> Mesa de Educación Municipal</div>
  </div>
</div>

<!-- MAIN CONTENT -->
<div class="main-content" id="mainContent">
  <div style="background:#fff;padding:15px 30px;border-bottom:1px solid #e9ecef;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px">
    <div>
      <h1 style="font-size:18px;font-weight:700;color:#1e3a5f">Sistema de Seguimiento y Evaluación</h1>
      <p style="font-size:12px;color:#888">Plan Educativo Municipal de Necoclí 2025–2035 | Estructura: <strong>4 Líneas → 6 Programas → 20 PA → 74 Componentes</strong></p>
    </div>
    <div style="display:flex;gap:10px;align-items:center">
      <select id="yearFilter" style="padding:6px 12px;border:1px solid #ddd;border-radius:8px;font-size:13px">
        <option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option>
      </select>
      <button class="btn btn-primary" onclick="exportCSV()"><i class="fas fa-download"></i> Exportar</button>
    </div>
  </div>

  <div style="padding:20px 30px;max-width:1400px;margin:0 auto">

    <!-- ============== PAGE: OVERVIEW ============== -->
    <div class="page active" id="page-overview">
      <div class="animate-in">

        <!-- KPIs -->
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(190px,1fr));gap:16px;margin-bottom:24px">
          <div class="kpi-card"><div class="value" id="kpiICE">0</div><div class="label">ICE-PEM Global</div></div>
          <div class="kpi-card" style="border-top-color:#2d6a4f"><div class="value" style="color:#2d6a4f">4</div><div class="label">Líneas Estratégicas</div></div>
          <div class="kpi-card" style="border-top-color:#457b9d"><div class="value" style="color:#457b9d">6</div><div class="label">Programas</div></div>
          <div class="kpi-card" style="border-top-color:#e9c46a"><div class="value" style="color:#e9c46a">20</div><div class="label">Proyectos Articuladores</div></div>
          <div class="kpi-card" style="border-top-color:#e76f51"><div class="value" style="color:#e76f51">74</div><div class="label">Componentes/Acciones</div></div>
        </div>

        <!-- ====== SECCIÓN: 4 LÍNEAS ESTRATÉGICAS ====== -->
        <div class="card">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <h3 style="font-size:16px;font-weight:700;color:#1e3a5f"><i class="fas fa-layer-group"></i> Avance por Línea Estratégica</h3>
            <span class="badge badge-blue">Solo 4 líneas</span>
          </div>
          <div id="overviewLines"></div>
        </div>

        <!-- CHARTS: SOLO 4 LÍNEAS -->
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(350px,1fr));gap:16px">
          <div class="card">
            <h3 style="font-size:14px;font-weight:700;margin-bottom:12px">Distribución por Línea (4 Líneas)</h3>
            <canvas id="chartDonut" height="260"></canvas>
          </div>
          <div class="card">
            <h3 style="font-size:14px;font-weight:700;margin-bottom:12px">Comparativo 4 Líneas Estratégicas</h3>
            <canvas id="chartBar" height="260"></canvas>
          </div>
        </div>

        <!-- 6 PROGRAMAS agrupados bajo 4 líneas -->
        <div class="card" style="margin-top:16px">
          <h3 style="font-size:16px;font-weight:700;margin-bottom:16px;color:#1e3a5f"><i class="fas fa-project-diagram"></i> 6 Programas (dentro de las 4 Líneas)</h3>
          <div id="overviewPrograms"></div>
        </div>

        <!-- TABLA DE INSTITUCIONES -->
        <div class="card" style="margin-top:16px">
          <h3 style="font-size:16px;font-weight:700;margin-bottom:16px;color:#1e3a5f"><i class="fas fa-school"></i> 19 Instituciones Educativas</h3>
          <div style="overflow-x:auto">
            <table>
              <thead><tr><th>Institución</th><th>Zona</th><th>Estudiantes</th><th>L1</th><th>L2</th><th>L3</th><th>L4</th><th>Promedio</th><th>Estado</th></tr></thead>
              <tbody id="overviewInstTable"></tbody>
            </table>
          </div>
        </div>

        <!-- ALERTAS -->
        <div class="card" style="margin-top:16px">
          <h3 style="font-size:16px;font-weight:700;margin-bottom:16px;color:#e76f51"><i class="fas fa-exclamation-triangle"></i> Alertas Prioritarias</h3>
          <div id="alertsBox"></div>
        </div>
      </div>
    </div>

    <!-- ============== PAGE: LINES ============== -->
    <div class="page" id="page-lines"><div class="animate-in" id="linesContent"></div></div>

    <!-- ============== PAGE: PROGRAMS ============== -->
    <div class="page" id="page-programs"><div class="animate-in" id="programsContent"></div></div>

    <!-- ============== PAGE: PROJECTS ============== -->
    <div class="page" id="page-projects">
      <div class="animate-in">
        <h2 style="font-size:20px;font-weight:700;color:#1e3a5f;margin-bottom:16px">20 Proyectos Articuladores</h2>
        <div style="margin-bottom:16px">
          <select id="filterPALine" onchange="renderProjects()" style="width:300px">
            <option value="all">Todas las líneas</option>
            <option value="L1">L1 – Equidad y Trayectorias</option>
            <option value="L2">L2 – Calidad e Innovación</option>
            <option value="L3">L3 – Identidad y Pertinencia</option>
            <option value="L4">L4 – Gobernanza</option>
          </select>
        </div>
        <div id="projectsList"></div>
      </div>
    </div>

    <!-- ============== PAGE: INSTITUTIONS ============== -->
    <div class="page" id="page-institutions">
      <div class="animate-in">
        <h2 style="font-size:20px;font-weight:700;color:#1e3a5f;margin-bottom:16px">Seguimiento por Institución</h2>
        <select id="instSelect" onchange="renderInstDetail()" style="width:100%;max-width:500px;margin-bottom:16px"></select>
        <div id="instDetail"></div>
      </div>
    </div>

    <!-- ============== PAGE: COMPONENTS ============== -->
    <div class="page" id="page-components">
      <div class="animate-in">
        <h2 style="font-size:20px;font-weight:700;color:#1e3a5f;margin-bottom:16px">74 Componentes</h2>
        <div style="position:relative;margin-bottom:16px">
          <i class="fas fa-search" style="position:absolute;left:14px;top:12px;color:#aaa"></i>
          <input id="compSearch" placeholder="Buscar componente..." oninput="filterComp()" style="padding:10px 16px 10px 40px;border:1px solid #ddd;border-radius:10px;width:100%;font-size:14px">
        </div>
        <div style="overflow-x:auto"><table><thead><tr><th>#</th><th>Componente</th><th>PA</th><th>Programa</th><th>Línea</th><th>Peso</th><th>Avance</th><th>Estado</th></tr></thead><tbody id="compTable"></tbody></table></div>
      </div>
    </div>

    <!-- ============== PAGE: ICE-PEM ============== -->
    <div class="page" id="page-icepem">
      <div class="animate-in">
        <h2 style="font-size:20px;font-weight:700;color:#1e3a5f;margin-bottom:8px">Índice Compuesto de Ejecución ICE-PEM</h2>
        <p style="color:#666;font-size:13px;margin-bottom:20px">ICE-PEM = 0.40·A + 0.25·B + 0.20·C + 0.15·D — Meta 2032: ≥ 60</p>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:16px">
          <div class="card" style="text-align:center">
            <canvas id="gaugeChart" height="200"></canvas>
            <div style="font-size:2.5rem;font-weight:800;color:#1e3a5f;margin-top:-10px" id="iceVal">0</div>
            <div style="font-size:12px;color:#888">ICE-PEM GLOBAL</div>
          </div>
          <div id="iceDims"></div>
        </div>
        <div class="card" style="margin-top:16px"><h4 style="font-weight:700;margin-bottom:12px">Radar de Dimensiones</h4><canvas id="iceRadar" height="300"></canvas></div>
      </div>
    </div>

    <!-- ============== PAGE: TIMELINE ============== -->
    <div class="page" id="page-timeline"><div class="animate-in" id="timelineContent"></div></div>

    <!-- ============== PAGE: DATA ENTRY ============== -->
    <div class="page" id="page-dataentry">
      <div class="animate-in">
        <h2 style="font-size:20px;font-weight:700;color:#1e3a5f;margin-bottom:8px">Registro de Avances</h2>
        <p style="color:#666;font-size:13px;margin-bottom:20px">Actualice el porcentaje de avance de cada componente por institución.</p>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:12px;margin-bottom:16px">
          <div><label style="font-size:12px;font-weight:600;color:#555;display:block;margin-bottom:4px">Institución</label><select id="entryInst" onchange="loadEntry()"></select></div>
          <div><label style="font-size:12px;font-weight:600;color:#555;display:block;margin-bottom:4px">Línea</label><select id="entryLine" onchange="loadEntry()"><option value="all">Todas</option><option value="L1">L1</option><option value="L2">L2</option><option value="L3">L3</option><option value="L4">L4</option></select></div>
          <div><label style="font-size:12px;font-weight:600;color:#555;display:block;margin-bottom:4px">Semestre</label><select id="entrySem"><option>2025-S1</option><option>2025-S2</option><option>2026-S1</option></select></div>
        </div>
        <div style="overflow-x:auto"><table><thead><tr><th>#</th><th>Componente</th><th>PA</th><th>Actual</th><th>Nuevo %</th><th>Observación</th></tr></thead><tbody id="entryTable"></tbody></table></div>
        <div style="margin-top:16px;display:flex;gap:10px">
          <button class="btn btn-success" onclick="saveEntry()"><i class="fas fa-save"></i> Guardar Avances</button>
          <button class="btn btn-outline" onclick="loadEntry()"><i class="fas fa-undo"></i> Restablecer</button>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- MODAL -->
<div class="modal-overlay" id="modal">
  <div class="modal">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px">
      <h3 style="font-size:18px;font-weight:700;color:#1e3a5f" id="modalTitle"></h3>
      <button onclick="document.getElementById('modal').classList.remove('show')" style="background:none;border:none;font-size:22px;cursor:pointer;color:#888">&times;</button>
    </div>
    <div id="modalBody"></div>
  </div>
</div>

<!-- NOTIFICATION -->
<div id="notif" style="position:fixed;top:20px;right:20px;background:#2d6a4f;color:#fff;padding:12px 24px;border-radius:10px;font-size:14px;font-weight:500;z-index:200;display:none;box-shadow:0 4px 12px rgba(0,0,0,.15)"></div>

<script>
// ========================================
// DATA MODEL — PEM NECOCLÍ
// 4 Líneas → 6 Programas → 20 PA → 74 Componentes
// ========================================

const API = 'https://script.google.com/macros/s/AKfycbyBVsYsbB2xf8NyqCQ_7elFRaRqhiTg4Y7a01tkoXCS5V1p9QzI7LC5t6nHBBD8HQQO/exec';

// ===== 4 LÍNEAS ESTRATÉGICAS =====
const LINES = [
  { id:'L1', name:'Educación para la Equidad y las Trayectorias Completas', short:'Equidad y Trayectorias', color:'#1e3a5f', weight:25, icon:'fa-balance-scale' },
  { id:'L2', name:'Calidad Educativa con Innovación y Sostenibilidad', short:'Calidad e Innovación', color:'#2d6a4f', weight:25, icon:'fa-star' },
  { id:'L3', name:'Educación con Identidad y Pertinencia Territorial', short:'Identidad y Pertinencia', color:'#e9c46a', weight:20, icon:'fa-map-marker-alt' },
  { id:'L4', name:'Gestión Educativa Participativa y con Gobernanza', short:'Gobernanza Educativa', color:'#e76f51', weight:30, icon:'fa-users-cog' }
];

// ===== 6 PROGRAMAS =====
const PROGRAMS = [
  { id:'P1', name:'Acceso y Equidad Educativa', line:'L1' },
  { id:'P2', name:'Desarrollo Personal, Familiar y Comunitario', line:'L1' },
  { id:'P3', name:'Calidad, Innovación y Mejora Continua', line:'L2' },
  { id:'P4', name:'Infraestructura y Recursos Educativos', line:'L2' },
  { id:'P5', name:'Pertinencia y Contextualización Educativa', line:'L3' },
  { id:'P6', name:'Gobernanza y Monitoreo del PEM', line:'L4' }
];

// ===== 20 PROYECTOS ARTICULADORES =====
const PAS = [
  {id:'PA-1',name:'Trayectorias Educativas Completas',prog:'P1',line:'L1'},
  {id:'PA-2',name:'Centros de Recursos para la Inclusión',prog:'P1',line:'L1'},
  {id:'PA-3',name:'Ruta de Cobertura Rural',prog:'P1',line:'L1'},
  {id:'PA-4',name:'Habilidades para la Vida',prog:'P1',line:'L1'},
  {id:'PA-5',name:'Puentes a la Educación Terciaria',prog:'P1',line:'L1'},
  {id:'PA-6',name:'Acompañamiento a Familias',prog:'P2',line:'L1'},
  {id:'PA-7',name:'Educación en Convivencia y Ética',prog:'P2',line:'L1'},
  {id:'PA-8',name:'Voluntariado y Participación Comunitaria',prog:'P2',line:'L1'},
  {id:'PA-9',name:'Plan de Mejora Continua',prog:'P3',line:'L2'},
  {id:'PA-10',name:'Formación y Acompañamiento Docente',prog:'P3',line:'L2'},
  {id:'PA-11',name:'Centro de Innovación / Dotación Científica',prog:'P3',line:'L2'},
  {id:'PA-12',name:'Plan Maestro de Infraestructura',prog:'P4',line:'L2'},
  {id:'PA-13',name:'Dotación TIC Integral',prog:'P4',line:'L2'},
  {id:'PA-14',name:'Laboratorios STEAM / Alianzas',prog:'P4',line:'L2'},
  {id:'PA-15',name:'Cátedra Municipal y Multiculturalidad',prog:'P5',line:'L3'},
  {id:'PA-16',name:'PEI Actualizados y Currículos',prog:'P5',line:'L3'},
  {id:'PA-17',name:'Aulas Abiertas / Gobiernos Escolares',prog:'P5',line:'L3'},
  {id:'PA-18',name:'Clubes de Lectura y Pensamiento Crítico',prog:'P5',line:'L3'},
  {id:'PA-19',name:'Proyectos Productivos Escolares',prog:'P5',line:'L3'},
  {id:'PA-20',name:'Participación y Gobernanza Educativa',prog:'P6',line:'L4'}
];

// ===== 74 COMPONENTES =====
const COMPS = [
  {id:1,name:'Adecuación espacios primera infancia',pa:'PA-1',w:25},{id:2,name:'Capacitación docentes primera infancia',pa:'PA-1',w:25},{id:3,name:'Formación familias primera infancia',pa:'PA-1',w:25},{id:4,name:'Protocolos seguridad infantil',pa:'PA-1',w:25},
  {id:5,name:'Espacios accesibles',pa:'PA-2',w:25},{id:6,name:'Dotación TIC adaptativa / braille',pa:'PA-2',w:25},{id:7,name:'Banco ayudas técnicas',pa:'PA-2',w:25},{id:8,name:'Formación educación inclusiva',pa:'PA-2',w:25},
  {id:9,name:'Transporte escolar seguro',pa:'PA-3',w:20},{id:10,name:'Aulas multigrado equipadas',pa:'PA-3',w:20},{id:11,name:'Docentes itinerantes / tutorías',pa:'PA-3',w:20},{id:12,name:'Modelos educativos flexibles',pa:'PA-3',w:20},{id:13,name:'Alimentación escolar',pa:'PA-3',w:20},
  {id:14,name:'Módulos proyecto de vida',pa:'PA-4',w:33},{id:15,name:'Educación financiera',pa:'PA-4',w:33},{id:16,name:'Mentorías por egresados',pa:'PA-4',w:34},
  {id:17,name:'Acompañamiento becas y pruebas',pa:'PA-5',w:33},{id:18,name:'Alianzas IES y ETDH',pa:'PA-5',w:33},{id:19,name:'Clubes lectura crítica',pa:'PA-5',w:34},
  {id:20,name:'Escuela de padres',pa:'PA-6',w:33},{id:21,name:'Atención psicosocial y jurídica',pa:'PA-6',w:33},{id:22,name:'Biblioteca recursos',pa:'PA-6',w:34},
  {id:23,name:'Programa Aulas sin violencia',pa:'PA-7',w:50},{id:24,name:'Mediadores escolares',pa:'PA-7',w:50},
  {id:25,name:'Plataforma voluntariado',pa:'PA-8',w:25},{id:26,name:'Alianzas público-privadas',pa:'PA-8',w:25},{id:27,name:'Jornadas servicio social',pa:'PA-8',w:25},{id:28,name:'Alfabetización comunitaria',pa:'PA-8',w:25},
  {id:29,name:'Tablero de control BI',pa:'PA-9',w:33},{id:30,name:'Simulacros ICFES trimestrales',pa:'PA-9',w:33},{id:31,name:'Planes de mejora por área',pa:'PA-9',w:34},
  {id:32,name:'Diagnóstico necesidades docentes',pa:'PA-10',w:20},{id:33,name:'Ciclos formación competencias',pa:'PA-10',w:20},{id:34,name:'Comunidades de práctica',pa:'PA-10',w:20},{id:35,name:'Mentores en aula',pa:'PA-10',w:20},{id:36,name:'Incentivos docentes',pa:'PA-10',w:20},
  {id:37,name:'Laboratorios STEAM',pa:'PA-11',w:25},{id:38,name:'Repositorio recursos abiertos',pa:'PA-11',w:25},{id:39,name:'Semilleros investigación',pa:'PA-11',w:25},{id:40,name:'Laboratorios ciencias',pa:'PA-11',w:25},
  {id:41,name:'Diagnóstico infraestructura',pa:'PA-12',w:33},{id:42,name:'Estándares accesibilidad',pa:'PA-12',w:33},{id:43,name:'Gestión recursos Nación',pa:'PA-12',w:34},
  {id:44,name:'Kits aula digital',pa:'PA-13',w:33},{id:45,name:'Plataforma LMS municipal',pa:'PA-13',w:33},{id:46,name:'Mantenimiento TIC',pa:'PA-13',w:34},
  {id:47,name:'Laboratorios fijos urbanos',pa:'PA-14',w:20},{id:48,name:'Laboratorio móvil veredas',pa:'PA-14',w:20},{id:49,name:'Clubes robótica y ciencia',pa:'PA-14',w:20},{id:50,name:'Convenios empresas/ONG',pa:'PA-14',w:20},{id:51,name:'Energía solar / agua lluvia',pa:'PA-14',w:20},
  {id:52,name:'Diseño curricular colaborativo',pa:'PA-15',w:33},{id:53,name:'Materiales multilingües',pa:'PA-15',w:33},{id:54,name:'Salidas pedagógicas territorio',pa:'PA-15',w:34},
  {id:55,name:'Matrices de pertinencia',pa:'PA-16',w:25},{id:56,name:'Secuencias didácticas diferenciadas',pa:'PA-16',w:25},{id:57,name:'Evaluación por competencias',pa:'PA-16',w:25},{id:58,name:'Sistemas evaluación revisados',pa:'PA-16',w:25},
  {id:59,name:'Huertas escolares y viveros',pa:'PA-17',w:20},{id:60,name:'Clases en espacios naturales',pa:'PA-17',w:20},{id:61,name:'Capacitación representantes estudiantiles',pa:'PA-17',w:20},{id:62,name:'Plan anual participación',pa:'PA-17',w:20},{id:63,name:'Observatorios estudiantiles',pa:'PA-17',w:20},
  {id:64,name:'Clubes lectura temáticos',pa:'PA-18',w:50},{id:65,name:'Guías análisis crítico',pa:'PA-18',w:50},
  {id:66,name:'Huertas, piscicultura, emprendimientos',pa:'PA-19',w:33},{id:67,name:'Feria anual ideas negocio',pa:'PA-19',w:33},{id:68,name:'Articulación con SENA',pa:'PA-19',w:34},
  {id:69,name:'Mesa Educación / Junta Municipal',pa:'PA-20',w:20},{id:70,name:'Sistemas información / tableros',pa:'PA-20',w:20},{id:71,name:'Participación comunitaria',pa:'PA-20',w:20},{id:72,name:'Rendición de cuentas educativa',pa:'PA-20',w:20},{id:73,name:'Alianzas interinstitucionales',pa:'PA-20',w:10},{id:74,name:'Evaluación y ajuste PEM',pa:'PA-20',w:10}
];

// ===== 19 INSTITUCIONES =====
const INSTS = [
  {id:'IE01',name:'CER Bobal La Playa',students:342,seats:4,zone:'Rural'},
  {id:'IE02',name:'CER El Paraíso',students:145,seats:5,zone:'Rural'},
  {id:'IE03',name:'CER Melilto Arriba',students:161,seats:3,zone:'Rural'},
  {id:'IE04',name:'CER Vale Pavas',students:166,seats:3,zone:'Rural'},
  {id:'IE05',name:'IER Caribia',students:631,seats:7,zone:'Rural'},
  {id:'IE06',name:'IE Antonio Roldán Betancur',students:1550,seats:3,zone:'Urbana'},
  {id:'IE07',name:'IER El Totumo',students:1539,seats:8,zone:'Rural'},
  {id:'IE08',name:'IER Melilto',students:636,seats:6,zone:'Rural'},
  {id:'IE09',name:'IER Mulaticos Piedrecitas',students:1196,seats:26,zone:'Rural'},
  {id:'IE10',name:'IER Mulatos',students:683,seats:6,zone:'Rural'},
  {id:'IE11',name:'IER San Sebastián de Urabá',students:548,seats:6,zone:'Rural'},
  {id:'IE12',name:'IER Tulapita',students:434,seats:8,zone:'Rural'},
  {id:'IE13',name:'IER Zapata',students:924,seats:6,zone:'Rural'},
  {id:'IE14',name:'IER Indígena José Elías Suárez',students:496,seats:6,zone:'Rural'},
  {id:'IE15',name:'IE Eduardo Espitia Romero',students:1624,seats:4,zone:'Urbana'},
  {id:'IE16',name:'IER La Comarca',students:513,seats:7,zone:'Rural'},
  {id:'IE17',name:'IER Las Changas',students:492,seats:8,zone:'Rural'},
  {id:'IE18',name:'IER Mello Villavicencio',students:412,seats:6,zone:'Rural'},
  {id:'IE19',name:'IER Pueblo Nuevo',students:592,seats:5,zone:'Rural'}
];

// ===== PROGRESS DATA =====
let progress = {};
INSTS.forEach(inst => { progress[inst.id] = {}; COMPS.forEach(c => { progress[inst.id][c.id] = 0; }); });

let iceDims = { A:0, B:22, C:30, D:25 };

// ========================================
// CALCULATION FUNCTIONS
// ========================================
function getLine(id) { return LINES.find(l => l.id === id); }
function color(v) { return v >= 70 ? '#2d6a4f' : v >= 40 ? '#e9c46a' : '#e76f51'; }
function badge(v) { return v >= 70 ? 'badge-green' : v >= 40 ? 'badge-yellow' : 'badge-red'; }
function status(v) { return v >= 70 ? 'En curso' : v >= 40 ? 'En progreso' : 'Sin iniciar'; }

function compAvg(compId) {
  let s = 0, n = 0;
  INSTS.forEach(i => { s += (progress[i.id][compId] || 0); n++; });
  return n ? Math.round(s / n) : 0;
}

function paAvg(paId) {
  const cs = COMPS.filter(c => c.pa === paId);
  if (!cs.length) return 0;
  let s = 0, w = 0;
  cs.forEach(c => { s += compAvg(c.id) * c.w; w += c.w; });
  return w ? Math.round(s / w) : 0;
}

function lineAvg(lineId) {
  const pas = PAS.filter(p => p.line === lineId);
  if (!pas.length) return 0;
  let s = 0; pas.forEach(p => s += paAvg(p.id));
  return Math.round(s / pas.length);
}

function progAvg(progId) {
  const pas = PAS.filter(p => p.prog === progId);
  if (!pas.length) return 0;
  let s = 0; pas.forEach(p => s += paAvg(p.id));
  return Math.round(s / pas.length);
}

function instLineAvg(instId, lineId) {
  const pas = lineId ? PAS.filter(p => p.line === lineId) : PAS;
  let s = 0, n = 0;
  pas.forEach(pa => {
    COMPS.filter(c => c.pa === pa.id).forEach(c => { s += (progress[instId][c.id] || 0); n++; });
  });
  return n ? Math.round(s / n) : 0;
}

function calcICE() {
  const A = Math.min(100, Math.round((lineAvg('L1') * 0.25 + lineAvg('L2') * 0.25 + lineAvg('L3') * 0.20 + lineAvg('L4') * 0.30)));
  iceDims.A = A;
  return Math.round(0.40 * iceDims.A + 0.25 * iceDims.B + 0.20 * iceDims.C + 0.15 * iceDims.D);
}

function notify(msg) {
  const n = document.getElementById('notif');
  n.innerHTML = '<i class="fas fa-check-circle"></i> ' + msg;
  n.style.display = 'block';
  setTimeout(() => n.style.display = 'none', 3000);
}

// ========================================
// NAVIGATION
// ========================================
function showPage(id, el) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.getElementById('page-' + id).classList.add('active');
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  if (el) el.classList.add('active');
  const render = { lines: renderLines, programs: renderPrograms, projects: renderProjects, institutions: renderInstitutions, components: renderComponents, icepem: renderICE, timeline: renderTimeline, dataentry: renderDataEntry };
  if (render[id]) render[id]();
}

// ========================================
// RENDER: OVERVIEW (PANEL GENERAL)
// ========================================
function renderOverview() {
  document.getElementById('kpiICE').textContent = calcICE();

  // === 4 LÍNEAS ESTRATÉGICAS ===
  let html = '';
  LINES.forEach(line => {
    const avg = lineAvg(line.id);
    const pasCount = PAS.filter(p => p.line === line.id).length;
    const progsCount = PROGRAMS.filter(p => p.line === line.id).length;
    html += `
    <div style="margin-bottom:18px;padding:14px;background:#f8f9fa;border-radius:10px;border-left:5px solid ${line.color}">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
        <div>
          <div style="display:flex;align-items:center;gap:8px">
            <i class="fas ${line.icon}" style="color:${line.color}"></i>
            <span style="font-size:14px;font-weight:700;color:${line.color}">${line.id}. ${line.short}</span>
          </div>
          <div style="font-size:11px;color:#888;margin-top:2px">${line.name} | Peso: ${line.weight}% | ${progsCount} programa(s) | ${pasCount} PA</div>
        </div>
        <div style="text-align:right">
          <span style="font-size:1.8rem;font-weight:800;color:${color(avg)}">${avg}%</span>
          <br><span class="badge ${badge(avg)}">${status(avg)}</span>
        </div>
      </div>
      <div class="progress-bar" style="margin-top:10px"><div class="progress-fill" style="width:${avg}%;background:${line.color}"></div></div>
    </div>`;
  });
  document.getElementById('overviewLines').innerHTML = html;

  // === 6 PROGRAMAS agrupados bajo sus 4 líneas ===
  let phtml = '';
  LINES.forEach(line => {
    const progs = PROGRAMS.filter(p => p.line === line.id);
    phtml += `<div style="margin-bottom:14px">
      <div style="font-size:12px;font-weight:700;color:${line.color};margin-bottom:6px;text-transform:uppercase"><i class="fas ${line.icon}"></i> ${line.id} — ${line.short}</div>
      <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:8px">`;
    progs.forEach(prog => {
      const avg = progAvg(prog.id);
      const pasCount = PAS.filter(p => p.prog === prog.id).length;
      phtml += `
      <div style="background:#f8f9fa;border-radius:8px;padding:12px;border-left:4px solid ${line.color}">
        <div style="display:flex;justify-content:space-between;align-items:center">
          <span style="font-size:13px;font-weight:600">${prog.id}. ${prog.name}</span>
          <span style="font-size:14px;font-weight:700;color:${color(avg)}">${avg}%</span>
        </div>
        <div class="progress-bar" style="margin-top:6px"><div class="progress-fill" style="width:${avg}%;background:${color(avg)}"></div></div>
        <div style="font-size:11px;color:#999;margin-top:4px">${pasCount} proyectos articuladores</div>
      </div>`;
    });
    phtml += `</div></div>`;
  });
  document.getElementById('overviewPrograms').innerHTML = phtml;

  // === TABLA DE INSTITUCIONES ===
  let tbl = '';
  INSTS.forEach(inst => {
    const l1 = instLineAvg(inst.id, 'L1'), l2 = instLineAvg(inst.id, 'L2'), l3 = instLineAvg(inst.id, 'L3'), l4 = instLineAvg(inst.id, 'L4');
    const avg = Math.round((l1 + l2 + l3 + l4) / 4);
    tbl += `<tr>
      <td style="font-weight:600;font-size:12px">${inst.name}</td>
      <td><span class="badge ${inst.zone === 'Rural' ? 'badge-green' : 'badge-blue'}">${inst.zone}</span></td>
      <td>${inst.students.toLocaleString()}</td>
      <td style="color:${LINES[0].color};font-weight:600">${l1}%</td>
      <td style="color:${LINES[1].color};font-weight:600">${l2}%</td>
      <td style="color:${LINES[2].color};font-weight:600">${l3}%</td>
      <td style="color:${LINES[3].color};font-weight:600">${l4}%</td>
      <td style="font-weight:700;color:${color(avg)}">${avg}%</td>
      <td><span class="badge ${badge(avg)}">${status(avg)}</span></td>
    </tr>`;
  });
  document.getElementById('overviewInstTable').innerHTML = tbl;

  // === ALERTAS ===
  let alerts = '';
  PAS.forEach(pa => {
    const avg = paAvg(pa.id);
    if (avg < 30) alerts += `<div style="padding:10px;border-left:4px solid #e76f51;background:#fff5f5;border-radius:0 8px 8px 0;margin-bottom:8px;font-size:13px"><strong>${pa.id} ${pa.name}</strong> — Avance: <span style="color:#e76f51;font-weight:700">${avg}%</span></div>`;
  });
  if (!alerts) alerts = '<div style="padding:10px;color:#2d6a4f"><i class="fas fa-check-circle"></i> No hay alertas críticas.</div>';
  document.getElementById('alertsBox').innerHTML = alerts;

  // === CHARTS ===
  renderOverviewCharts();
}

function renderOverviewCharts() {
  // DONUT — SOLO 4 LÍNEAS
  const ctx1 = document.getElementById('chartDonut').getContext('2d');
  if (window._donut) window._donut.destroy();
  window._donut = new Chart(ctx1, {
    type: 'doughnut',
    data: {
      labels: LINES.map(l => l.id + ' ' + l.short),
      datasets: [{
        data: LINES.map(l => lineAvg(l.id)),
        backgroundColor: LINES.map(l => l.color),
        borderWidth: 2, borderColor: '#fff'
      }]
    },
    options: { responsive: true, plugins: { legend: { position: 'bottom', labels: { font: { size: 11 } } } } }
  });

  // BAR — SOLO 4 LÍNEAS
  const ctx2 = document.getElementById('chartBar').getContext('2d');
  if (window._bar) window._bar.destroy();
  window._bar = new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: LINES.map(l => l.id + ' ' + l.short),
      datasets: [{
        label: 'Avance %',
        data: LINES.map(l => lineAvg(l.id)),
        backgroundColor: LINES.map(l => l.color + 'CC'),
        borderColor: LINES.map(l => l.color),
        borderWidth: 1, borderRadius: 6
      }]
    },
    options: {
      responsive: true,
      scales: { y: { beginAtZero: true, max: 100, ticks: { callback: v => v + '%' } } },
      plugins: { legend: { display: false } }
    }
  });
}

// ========================================
// RENDER: LÍNEAS ESTRATÉGICAS
// ========================================
function renderLines() {
  let html = '<h2 style="font-size:20px;font-weight:700;color:#1e3a5f;margin-bottom:16px">4 Líneas Estratégicas del PEM</h2>';
  LINES.forEach(line => {
    const avg = lineAvg(line.id);
    const progs = PROGRAMS.filter(p => p.line === line.id);
    html += `<div class="card" style="border-left:5px solid ${line.color}">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:10px">
        <div>
          <h3 style="font-size:16px;font-weight:700;color:${line.color}"><i class="fas ${line.icon}"></i> ${line.id}. ${line.name}</h3>
          <p style="font-size:12px;color:#888;margin-top:2px">Peso: ${line.weight}% | ${progs.length} programa(s) | ${PAS.filter(p => p.line === line.id).length} PA</p>
        </div>
        <div style="text-align:right"><span style="font-size:2rem;font-weight:800;color:${color(avg)}">${avg}%</span><br><span class="badge ${badge(avg)}">${status(avg)}</span></div>
      </div>
      <div class="progress-bar" style="margin:12px 0"><div class="progress-fill" style="width:${avg}%;background:${line.color}"></div></div>`;

    progs.forEach(prog => {
      const pavg = progAvg(prog.id);
      const progPAs = PAS.filter(p => p.prog === prog.id);
      html += `<div style="background:#f0f4f8;border-radius:8px;padding:12px;margin-bottom:10px">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px">
          <span style="font-size:13px;font-weight:700">${prog.id}. ${prog.name}</span>
          <span style="font-weight:700;color:${color(pavg)}">${pavg}%</span>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:8px">
        ${progPAs.map(pa => {
          const a = paAvg(pa.id);
          return `<div style="background:#fff;border-radius:8px;padding:10px;cursor:pointer;border:1px solid #e9ecef" onclick="showPADetail('${pa.id}')">
            <div style="display:flex;justify-content:space-between"><span style="font-size:11px;font-weight:600;color:${line.color}">${pa.id}</span><span style="font-weight:700;color:${color(a)}">${a}%</span></div>
            <div style="font-size:12px;margin:4px 0">${pa.name}</div>
            <div class="progress-bar" style="margin-top:4px"><div class="progress-fill" style="width:${a}%;background:${color(a)}"></div></div>
          </div>`;
        }).join('')}
        </div>
      </div>`;
    });
    html += `</div>`;
  });
  document.getElementById('linesContent').innerHTML = html;
}

// ========================================
// RENDER: PROGRAMAS
// ========================================
function renderPrograms() {
  let html = '<h2 style="font-size:20px;font-weight:700;color:#1e3a5f;margin-bottom:4px">6 Programas Estratégicos</h2>';
  html += '<p style="font-size:13px;color:#888;margin-bottom:16px">Distribuidos en las 4 líneas estratégicas</p>';
  PROGRAMS.forEach(prog => {
    const avg = progAvg(prog.id);
    const line = getLine(prog.line);
    const pas = PAS.filter(p => p.prog === prog.id);
    html += `<div class="card" style="border-left:4px solid ${line.color}">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap">
        <div>
          <span class="badge" style="background:${line.color}22;color:${line.color}">${line.id} — ${line.short}</span>
          <h3 style="font-size:15px;font-weight:700;margin-top:4px">${prog.id}. ${prog.name}</h3>
          <p style="font-size:12px;color:#888">${pas.length} proyectos articuladores</p>
        </div>
        <span style="font-size:1.8rem;font-weight:800;color:${color(avg)}">${avg}%</span>
      </div>
      <div class="progress-bar" style="margin:10px 0"><div class="progress-fill" style="width:${avg}%;background:${line.color}"></div></div>
      <table><thead><tr><th>PA</th><th>Componentes</th><th>Avance</th><th>Estado</th></tr></thead><tbody>
      ${pas.map(pa => { const a = paAvg(pa.id); return `<tr><td style="font-weight:500">${pa.id} - ${pa.name}</td><td>${COMPS.filter(c => c.pa === pa.id).length}</td><td><div class="progress-bar" style="width:100px;display:inline-block"><div class="progress-fill" style="width:${a}%;background:${color(a)}"></div></div> ${a}%</td><td><span class="badge ${badge(a)}">${status(a)}</span></td></tr>`; }).join('')}
      </tbody></table>
    </div>`;
  });
  document.getElementById('programsContent').innerHTML = html;
}

// ========================================
// RENDER: PROYECTOS ARTICULADORES
// ========================================
function renderProjects() {
  const f = document.getElementById('filterPALine').value;
  const filtered = f === 'all' ? PAS : PAS.filter(p => p.line === f);
  let html = '';
  filtered.forEach(pa => {
    const avg = paAvg(pa.id);
    const line = getLine(pa.line);
    const cs = COMPS.filter(c => c.pa === pa.id);
    html += `<div class="card" style="cursor:pointer" onclick="showPADetail('${pa.id}')">
      <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px">
        <div>
          <span class="badge" style="background:${line.color}22;color:${line.color}">${line.id}</span>
          <h4 style="font-size:14px;font-weight:700;margin-top:4px">${pa.id} — ${pa.name}</h4>
          <p style="font-size:12px;color:#888">${cs.length} componentes | ${PROGRAMS.find(p => p.id === pa.prog).name}</p>
        </div>
        <div style="text-align:right"><span style="font-size:1.6rem;font-weight:800;color:${color(avg)}">${avg}%</span><br><span class="badge ${badge(avg)}">${status(avg)}</span></div>
      </div>
      <div class="progress-bar" style="margin-top:10px"><div class="progress-fill" style="width:${avg}%;background:${color(avg)}"></div></div>
    </div>`;
  });
  document.getElementById('projectsList').innerHTML = html;
}

function showPADetail(paId) {
  const pa = PAS.find(p => p.id === paId);
  const cs = COMPS.filter(c => c.pa === paId);
  let body = `<p style="font-size:13px;color:#888;margin-bottom:16px">${pa.line} › ${PROGRAMS.find(p => p.id === pa.prog).name}</p>`;
  body += `<table><thead><tr><th>Componente</th><th>Peso</th><th>Avance</th><th>Estado</th></tr></thead><tbody>`;
  cs.forEach(c => {
    const avg = compAvg(c.id);
    body += `<tr><td>${c.id}. ${c.name}</td><td>${c.w}%</td><td><div class="progress-bar" style="width:100px;display:inline-block"><div class="progress-fill" style="width:${avg}%;background:${color(avg)}"></div></div> ${avg}%</td><td><span class="badge ${badge(avg)}">${status(avg)}</span></td></tr>`;
  });
  body += '</tbody></table>';
  document.getElementById('modalTitle').textContent = `${pa.id} — ${pa.name}`;
  document.getElementById('modalBody').innerHTML = body;
  document.getElementById('modal').classList.add('show');
}

// ========================================
// RENDER: INSTITUCIONES
// ========================================
function renderInstitutions() {
  const sel = document.getElementById('instSelect');
  if (!sel.options.length) sel.innerHTML = INSTS.map(i => `<option value="${i.id}">${i.name}</option>`).join('');
  renderInstDetail();
}

function renderInstDetail() {
  const instId = document.getElementById('instSelect').value;
  const inst = INSTS.find(i => i.id === instId);
  if (!inst) return;
  const avg = instLineAvg(instId);
  let html = `<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(170px,1fr));gap:12px;margin-bottom:16px">
    <div class="kpi-card" style="border-top-color:${color(avg)}"><div class="value" style="color:${color(avg)}">${avg}%</div><div class="label">Avance Global</div></div>
    <div class="kpi-card"><div class="value">${inst.students}</div><div class="label">Estudiantes</div></div>
    <div class="kpi-card"><div class="value">${inst.seats}</div><div class="label">Sedes</div></div>
    <div class="kpi-card"><div class="value">${inst.zone}</div><div class="label">Zona</div></div>
  </div>`;
  html += `<div class="card"><h4 style="font-weight:700;margin-bottom:12px">Avance por Línea (4 Líneas)</h4>`;
  LINES.forEach(line => {
    const a = instLineAvg(instId, line.id);
    html += `<div style="margin-bottom:12px"><div style="display:flex;justify-content:space-between;font-size:13px;margin-bottom:4px"><span style="font-weight:600;color:${line.color}"><i class="fas ${line.icon}"></i> ${line.id} — ${line.short}</span><span style="font-weight:700;color:${color(a)}">${a}%</span></div><div class="progress-bar"><div class="progress-fill" style="width:${a}%;background:${line.color}"></div></div></div>`;
  });
  html += `</div>`;
  html += `<div class="card"><h4 style="font-weight:700;margin-bottom:12px">Detalle por PA</h4><table><thead><tr><th>PA</th><th>Línea</th><th>Avance</th><th>Estado</th></tr></thead><tbody>`;
  PAS.forEach(pa => {
    const cs = COMPS.filter(c => c.pa === pa.id);
    let s = 0, w = 0;
    cs.forEach(c => { s += (progress[instId][c.id] || 0) * c.w; w += c.w; });
    const a = w ? Math.round(s / w) : 0;
    const line = getLine(pa.line);
    html += `<tr><td style="font-weight:500;font-size:12px">${pa.id} - ${pa.name}</td><td><span class="badge" style="background:${line.color}22;color:${line.color}">${line.id}</span></td><td><div class="progress-bar" style="width:100px;display:inline-block"><div class="progress-fill" style="width:${a}%;background:${color(a)}"></div></div> ${a}%</td><td><span class="badge ${badge(a)}">${status(a)}</span></td></tr>`;
  });
  html += '</tbody></table></div>';
  document.getElementById('instDetail').innerHTML = html;
}

// ========================================
// RENDER: COMPONENTES
// ========================================
function renderComponents() {
  let html = '';
  COMPS.forEach(c => {
    const avg = compAvg(c.id);
    const pa = PAS.find(p => p.id === c.pa);
    const prog = PROGRAMS.find(p => p.id === pa.prog);
    const line = getLine(pa.line);
    html += `<tr class="cRow" data-n="${c.name.toLowerCase()}">
      <td>${c.id}</td><td style="font-size:12px">${c.name}</td><td><span class="badge" style="background:${line.color}22;color:${line.color}">${c.pa}</span></td>
      <td>${prog.id}</td><td style="color:${line.color};font-weight:600">${line.id}</td><td>${c.w}%</td>
      <td><div class="progress-bar" style="width:80px;display:inline-block"><div class="progress-fill" style="width:${avg}%;background:${color(avg)}"></div></div> ${avg}%</td>
      <td><span class="badge ${badge(avg)}">${status(avg)}</span></td></tr>`;
  });
  document.getElementById('compTable').innerHTML = html;
}

function filterComp() {
  const q = document.getElementById('compSearch').value.toLowerCase();
  document.querySelectorAll('.cRow').forEach(r => { r.style.display = r.dataset.n.includes(q) ? '' : 'none'; });
}

// ========================================
// RENDER: ICE-PEM
// ========================================
function renderICE() {
  const ice = calcICE();
  document.getElementById('iceVal').textContent = ice.toFixed(1);

  const dims = [
    { key: 'A', name: 'Resultados Programáticos', weight: '40%', threshold: 55, color: '#1e3a5f' },
    { key: 'B', name: 'Inversión y Gestión', weight: '25%', threshold: 55, color: '#2d6a4f' },
    { key: 'C', name: 'Gobernanza', weight: '20%', threshold: 55, color: '#457b9d' },
    { key: 'D', name: 'Habilitadores', weight: '15%', threshold: 50, color: '#e76f51' }
  ];

  let dhtml = '';
  dims.forEach(d => {
    const v = iceDims[d.key];
    dhtml += `<div class="card"><h4 style="font-weight:600;font-size:14px;margin-bottom:8px">${d.key}. ${d.name} (${d.weight})</h4><div class="progress-bar"><div class="progress-fill" style="width:${v}%;background:${d.color}"></div></div><div style="display:flex;justify-content:space-between;margin-top:4px;font-size:12px;color:#888"><span>Umbral: ≥${d.threshold}</span><span>${v}/100</span></div></div>`;
  });
  document.getElementById('iceDims').innerHTML = dhtml;

  const ctx = document.getElementById('gaugeChart').getContext('2d');
  if (window._gauge) window._gauge.destroy();
  window._gauge = new Chart(ctx, { type: 'doughnut', data: { datasets: [{ data: [ice, 100 - ice], backgroundColor: [color(ice), '#e9ecef'], borderWidth: 0 }] }, options: { circumference: 180, rotation: 270, cutout: '75%', responsive: true, plugins: { legend: { display: false }, tooltip: { enabled: false } } } });

  const ctx2 = document.getElementById('iceRadar').getContext('2d');
  if (window._radar) window._radar.destroy();
  window._radar = new Chart(ctx2, { type: 'radar', data: { labels: dims.map(d => d.key + '. ' + d.name), datasets: [{ label: 'ICE-PEM', data: dims.map(d => iceDims[d.key]), backgroundColor: 'rgba(30,58,95,.2)', borderColor: '#1e3a5f', pointBackgroundColor: '#1e3a5f' }, { label: 'Umbral', data: dims.map(d => d.threshold), backgroundColor: 'rgba(231,111,81,.1)', borderColor: '#e76f51', borderDash: [5, 5], pointBackgroundColor: '#e76f51' }] }, options: { responsive: true, scales: { r: { beginAtZero: true, max: 100 } } } });
}

// ========================================
// RENDER: TIMELINE
// ========================================
function renderTimeline() {
  const milestones = [
    { year: '2025', items: ['Aprobación PEM por Concejo', 'Manual Operativo', 'Tablero v1', 'PTAE 2025', 'Priorización PA-3/5/10/12/13'] },
    { year: '2026', items: ['Roles Mesa/JUME formalizados', 'PTAE 2026', 'Primer corte diciembre'] },
    { year: '2027', items: ['Pacto por la Educación 2028-2031', 'Banco de Proyectos'] },
    { year: '2028', items: ['Evaluación externa #1', 'PEM incorporado al PDM', 'Tablero v2'] },
    { year: '2030', items: ['Evaluación externa #2', 'Actualización Plan 2030-2032'] },
    { year: '2032', items: ['Evaluación externa #3', 'Hito: ICE-PEM ≥ 60'] },
    { year: '2033-35', items: ['Fase consolidación y sostenibilidad'] }
  ];
  let html = '<h2 style="font-size:20px;font-weight:700;color:#1e3a5f;margin-bottom:16px">Cronograma y Hitos</h2>';
  milestones.forEach((m, i) => {
    const cur = parseInt(m.year) <= new Date().getFullYear();
    html += `<div style="display:flex;gap:20px;margin-bottom:8px">
      <div style="display:flex;flex-direction:column;align-items:center;min-width:70px">
        <div style="width:36px;height:36px;border-radius:50%;background:${cur ? '#1e3a5f' : '#ddd'};color:${cur ? '#fff' : '#888'};display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700">${m.year.substring(2)}</div>
        ${i < milestones.length - 1 ? '<div style="width:2px;flex:1;background:#ddd;margin:4px 0"></div>' : ''}
      </div>
      <div class="card" style="flex:1;border-left:3px solid ${cur ? '#1e3a5f' : '#ddd'}">
        <h4 style="font-size:14px;font-weight:700;color:${cur ? '#1e3a5f' : '#888'}">${m.year}</h4>
        <ul style="margin:8px 0 0 16px;font-size:13px;color:#555">${m.items.map(it => '<li style="margin-bottom:4px">' + it + '</li>').join('')}</ul>
      </div>
    </div>`;
  });
  document.getElementById('timelineContent').innerHTML = html;
}

// ========================================
// RENDER: DATA ENTRY
// ========================================
function renderDataEntry() {
  const sel = document.getElementById('entryInst');
  if (!sel.options.length) sel.innerHTML = INSTS.map(i => `<option value="${i.id}">${i.name}</option>`).join('');
  loadEntry();
}

function loadEntry() {
  const instId = document.getElementById('entryInst').value;
  const lf = document.getElementById('entryLine').value;
  const filtered = lf === 'all' ? COMPS : COMPS.filter(c => { const pa = PAS.find(p => p.id === c.pa); return pa && pa.line === lf; });
  let html = '';
  filtered.forEach(c => {
    const val = progress[instId] ? progress[instId][c.id] || 0 : 0;
    html += `<tr>
      <td>${c.id}</td><td style="font-size:12px">${c.name}</td><td><span class="badge badge-blue">${c.pa}</span></td>
      <td><div class="progress-bar" style="width:60px;display:inline-block"><div class="progress-fill" style="width:${val}%;background:${color(val)}"></div></div> ${val}%</td>
      <td><input type="number" min="0" max="100" value="${val}" data-comp="${c.id}" class="eInput" style="width:80px"></td>
      <td><input type="text" placeholder="Observación..." data-obs="${c.id}" style="padding:6px;border:1px solid #ddd;border-radius:6px;font-size:12px;width:100%"></td>
    </tr>`;
  });
  document.getElementById('entryTable').innerHTML = html;
}

function saveEntry() {
  const instId = document.getElementById('entryInst').value;
  const sem = document.getElementById('entrySem').value;
  const avances = [];
  document.querySelectorAll('.eInput').forEach(inp => {
    const cid = parseInt(inp.dataset.comp);
    const val = Math.min(100, Math.max(0, parseInt(inp.value) || 0));
    progress[instId][cid] = val;
    const obs = document.querySelector('[data-obs="' + cid + '"]');
    avances.push({ instId, compId: cid, value: val, obs: obs ? obs.value : '', semester: sem });
  });
  fetch(API, { method: 'POST', body: JSON.stringify({ type: 'dashboard', avances }), headers: { 'Content-Type': 'text/plain;charset=utf-8' } })
    .then(r => r.json()).then(d => { if (d.status === 'ok') notify('Avances guardados en la nube'); else notify('Guardado local'); })
    .catch(() => notify('Guardado local (sin conexión)'));
  renderOverview();
  loadEntry();
}

function exportCSV() {
  let csv = 'Institución,Componente,PA,Línea,Avance\n';
  INSTS.forEach(inst => { COMPS.forEach(c => { const pa = PAS.find(p => p.id === c.pa); csv += `"${inst.name}","${c.name}",${c.pa},${pa.line},${progress[inst.id][c.id] || 0}\n`; }); });
  const blob = new Blob([csv], { type: 'text/csv' });
  const a = document.createElement('a'); a.href = URL.createObjectURL(blob); a.download = 'PEM_Necoclí.csv'; a.click();
  notify('CSV exportado');
}

// ========================================
// INIT
// ========================================
document.addEventListener('DOMContentLoaded', () => {
  fetch(API + '?action=avances').then(r => r.json()).then(d => {
    if (d.data) d.data.forEach(row => { if (progress[row.instId]) progress[row.instId][row.compId] = parseInt(row.value) || 0; });
    renderOverview();
  }).catch(() => { renderOverview(); });
});
</script>

</body>
</html>