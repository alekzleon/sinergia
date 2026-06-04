<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') | Sinergia A.C.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand-blue: #30567E;
            --brand-blue-2: #4A7DB5;
            --brand-green: #7CB342;
            --brand-orange: #FF8C00;
            --brand-lilac: #9575CD;
            --brand-red: #E57373;
            --ink: #213043;
            --muted: #718096;
            --line: #e7edf4;
            --surface: #ffffff;
            --canvas: #f4f7fb;
        }
        * { letter-spacing: 0; }
        body {
            background: var(--canvas);
            color: var(--ink);
            font-family: Inter, system-ui, sans-serif;
            font-size: .875rem;
        }
        h1, h2, h3, h4, h5, h6 { font-family: Nunito, Inter, sans-serif; }
        h1, .h1 { font-size: 1.35rem; }
        h2, .h2 { font-size: 1.2rem; }
        h5, .h5 { font-size: .98rem; }
        .sidebar {
            width: 224px;
            background: #182437;
            min-height: 100vh;
            position: fixed;
            inset: 0 auto 0 0;
            box-shadow: 12px 0 28px rgba(33, 48, 67, .12);
            overflow-y: auto;
        }
        .sidebar-inner { min-height: 100vh; display: flex; flex-direction: column; }
        .brand-dot {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            background: linear-gradient(135deg, #19b394, #4A7DB5);
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 800;
            font-size: .82rem;
            box-shadow: 0 8px 18px rgba(25, 179, 148, .22);
        }
        .nav-section-label {
            color: rgba(255, 255, 255, .38);
            font-size: .64rem;
            font-weight: 700;
            text-transform: uppercase;
            padding: .7rem .65rem .2rem;
        }
        .sidebar a {
            color: rgba(255,255,255,.82);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: .58rem;
            padding: .5rem .65rem;
            border-radius: 7px;
            font-weight: 600;
            font-size: .82rem;
            transition: background .18s ease, color .18s ease, transform .18s ease;
        }
        .sidebar a i { font-size: .92rem; width: 1.08rem; text-align: center; opacity: .82; }
        .sidebar a:hover, .sidebar a.active {
            color: #fff;
            background: rgba(25, 179, 148, .14);
            transform: translateX(2px);
        }
        .sidebar .btn { padding: .45rem .65rem; font-size: .8rem; }
        .content { margin-left: 224px; min-height: 100vh; }
        .topbar {
            position: sticky;
            top: 0;
            z-index: 30;
            background: rgba(255, 255, 255, .9);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(231, 237, 244, .85);
        }
        .topbar .badge { font-size: .72rem; }
        .page-shell { max-width: 1240px; margin: 0 auto; }
        .page-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: .9rem;
        }
        .eyebrow {
            color: var(--brand-orange);
            font-size: .64rem;
            font-weight: 800;
            text-transform: uppercase;
        }
        .card, .admin-card {
            border: 1px solid rgba(231, 237, 244, .95);
            border-radius: 8px;
            background: var(--surface);
            box-shadow: 0 8px 22px rgba(33, 48, 67, .06);
        }
        .admin-card-header {
            border-bottom: 1px solid var(--line);
            background: #fbfcfe;
            padding: .7rem .9rem;
        }
        .empty-state {
            padding: 1.8rem 1rem;
            color: var(--muted);
        }
        .empty-state i {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: inline-grid;
            place-items: center;
            background: #eef5fb;
            color: var(--brand-blue-2);
            font-size: 1rem;
            margin-bottom: .5rem;
        }
        .table { --bs-table-bg: transparent; }
        .table td, .table th { padding: .62rem .78rem; font-size: .82rem; }
        .table thead th {
            color: #6b7a8e;
            font-size: .68rem;
            text-transform: uppercase;
            background: #f8fafc;
            border-bottom: 1px solid var(--line);
        }
        .table tbody tr:hover { background: #fbfcfe; }
        .btn-primary {
            --bs-btn-bg: var(--brand-blue-2);
            --bs-btn-border-color: var(--brand-blue-2);
            --bs-btn-hover-bg: #3D6A9A;
            --bs-btn-hover-border-color: #3D6A9A;
            border-radius: 8px;
            font-weight: 700;
            font-size: .82rem;
        }
        .btn-outline-primary {
            --bs-btn-color: var(--brand-blue-2);
            --bs-btn-border-color: #b8cbe0;
            --bs-btn-hover-bg: var(--brand-blue-2);
            --bs-btn-hover-border-color: var(--brand-blue-2);
            border-radius: 8px;
            font-weight: 700;
            font-size: .82rem;
        }
        .btn-outline-secondary, .btn-outline-danger { border-radius: 8px; font-weight: 700; font-size: .82rem; }
        .btn-icon {
            width: 30px;
            height: 30px;
            display: inline-grid;
            place-items: center;
            padding: 0;
        }
        .btn, .form-control, .form-select, .input-group-text { border-radius: 8px; }
        .form-control, .form-select { border-color: #dbe5ef; padding: .52rem .68rem; font-size: .82rem; }
        .form-control:focus, .form-select:focus { border-color: #8fb4dc; box-shadow: 0 0 0 .22rem rgba(74,125,181,.14); }
        .form-label { font-weight: 700; color: #3e5066; font-size: .76rem; margin-bottom: .28rem; }
        .form-check-input:checked { background-color: var(--brand-green); border-color: var(--brand-green); }
        .metric-card {
            min-height: 92px;
            position: relative;
            overflow: hidden;
            transition: transform .18s ease, box-shadow .18s ease;
        }
        .metric-card:hover { transform: translateY(-3px); box-shadow: 0 22px 48px rgba(33, 48, 67, .1); }
        .metric-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: grid;
            place-items: center;
            color: #fff;
            font-size: .95rem;
        }
        .metric-value { color: var(--brand-blue); font-size: 1.45rem; line-height: 1; }
        .metric-blue { background: linear-gradient(135deg, #4A7DB5, #71A3DC); }
        .metric-green { background: linear-gradient(135deg, #7CB342, #AED581); }
        .metric-orange { background: linear-gradient(135deg, #FF8C00, #FFB74D); }
        .metric-lilac { background: linear-gradient(135deg, #9575CD, #BA68C8); }
        .status-pill {
            border-radius: 999px;
            padding: .28rem .48rem;
            font-weight: 800;
            font-size: .68rem;
        }
        .alert { border: 0; border-radius: 8px; box-shadow: 0 14px 34px rgba(33, 48, 67, .06); }
        .login-canvas { min-height: 100vh; display: grid; place-items: center; padding: 2rem 1rem; }
        .login-card { max-width: 440px; width: 100%; }
        .login-aside {
            color: #fff;
            background: linear-gradient(145deg, #315b83, #4578ad);
            border-radius: 8px;
            padding: 1.5rem;
        }
        .preview-thumb {
            width: 56px;
            height: 40px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--line);
        }
        .preview-placeholder {
            width: 56px;
            height: 40px;
            border-radius: 8px;
            border: 1px dashed #c7d4e2;
            display: inline-grid;
            place-items: center;
            background: #f8fafc;
            color: #8a9aab;
        }
        .setting-preview {
            max-height: 72px;
            max-width: 150px;
            object-fit: contain;
            border-radius: 8px;
            border: 1px solid var(--line);
            background: #fff;
            padding: .35rem;
        }
        .quick-actions-bar,
        .settings-savebar {
            position: sticky;
            top: 51px;
            z-index: 20;
            background: rgba(244, 247, 251, .92);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(231, 237, 244, .95);
            border-radius: 8px;
            box-shadow: 0 8px 22px rgba(33, 48, 67, .06);
        }
        .settings-tabs {
            overflow-x: auto;
            flex-wrap: nowrap;
            border-bottom: 1px solid var(--line);
            background: #fbfcfe;
        }
        .settings-tabs .nav-link {
            color: #607086;
            border: 0;
            border-radius: 0;
            padding: .7rem .9rem;
            font-size: .8rem;
            font-weight: 800;
            white-space: nowrap;
        }
        .settings-tabs .nav-link.active {
            color: var(--brand-blue);
            background: #fff;
            box-shadow: inset 0 -2px 0 var(--brand-green);
        }
        .settings-tab-pane { min-height: 360px; }
        .settings-section-card .row { --bs-gutter-x: .75rem; --bs-gutter-y: .7rem; }
        .compact-help { font-size: .75rem; color: var(--muted); }
        @media (max-width: 991px) {
            .sidebar { position: static; width: 100%; min-height: auto; }
            .sidebar-inner { min-height: auto; }
            .content { margin-left: 0; }
            .topbar { position: static; }
            .page-title { align-items: flex-start; flex-direction: column; }
            .quick-actions-bar, .settings-savebar { top: 0; }
        }
    </style>
</head>
<body>
@auth
    <aside class="sidebar p-2">
        <div class="sidebar-inner">
            <div class="d-flex align-items-center gap-2 text-white mb-3 px-1 py-2">
                <span class="brand-dot">S</span>
                <div>
                    <div class="fw-bold lh-1 small">Sinergia A.C.</div>
                    <small class="text-white-50">Admin</small>
                </div>
            </div>
            <nav class="d-grid gap-1">
                <div class="nav-section-label">General</div>
                <a href="{{ route('admin.dashboard') }}" @class(['active' => request()->routeIs('admin.dashboard')])><i class="bi bi-grid-1x2-fill"></i>Panel</a>
                <a href="{{ route('admin.settings') }}" @class(['active' => request()->routeIs('admin.settings')])><i class="bi bi-sliders"></i>Configuración</a>
                <div class="nav-section-label">Contenido</div>
                <a href="{{ route('admin.posts.index') }}" @class(['active' => request()->routeIs('admin.posts.*')])><i class="bi bi-newspaper"></i>Blog / Noticias</a>
                <a href="{{ route('admin.programs.index') }}" @class(['active' => request()->routeIs('admin.programs.*')])><i class="bi bi-heart-pulse"></i>Programas</a>
                <a href="{{ route('admin.team.index') }}" @class(['active' => request()->routeIs('admin.team.*')])><i class="bi bi-people"></i>Equipo</a>
                <a href="{{ route('admin.gallery.index') }}" @class(['active' => request()->routeIs('admin.gallery.*')])><i class="bi bi-images"></i>Galería</a>
                <div class="nav-section-label">Formularios</div>
                <a href="{{ route('admin.messages') }}" @class(['active' => request()->routeIs('admin.messages*')])><i class="bi bi-envelope-paper"></i>Mensajes</a>
                <a href="{{ route('admin.volunteers') }}" @class(['active' => request()->routeIs('admin.volunteers*')])><i class="bi bi-hand-thumbs-up"></i>Voluntarios</a>
            </nav>
            <div class="mt-auto pt-3">
                <a href="{{ route('home') }}" target="_blank" class="mb-2"><i class="bi bi-box-arrow-up-right"></i>Ver sitio</a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button class="btn btn-outline-light w-100"><i class="bi bi-door-open me-2"></i>Cerrar sesión</button>
                </form>
            </div>
        </div>
    </aside>
@endauth

@auth
    <main class="content">
        <div class="topbar px-3 py-2">
            <div class="page-shell d-flex align-items-center justify-content-between gap-3">
                <div>
                    <div class="text-muted small">Admin</div>
                    <div class="fw-bold">@yield('title', 'Admin')</div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge rounded-pill text-bg-light border">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </div>
        <div class="page-shell p-3">
            @if(session('status'))
                <div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>{{ session('status') }}</div>
            @endif
            @yield('content')
        </div>
    </main>
@else
    <main>
        @yield('content')
    </main>
@endauth

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
