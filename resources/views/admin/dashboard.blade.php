@extends('admin.layout')

@section('title', 'Panel')

@section('content')
<div class="page-title">
    <div>
        <div class="eyebrow">Resumen</div>
        <h1 class="h2 fw-bold mb-1">Panel</h1>
        <p class="text-muted mb-0">Una vista rápida de la actividad y contenido del sitio.</p>
    </div>
    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary"><i class="bi bi-box-arrow-up-right me-2"></i>Ver sitio</a>
</div>

<div class="quick-actions-bar px-3 py-2 mb-3">
    <div class="d-flex flex-column flex-md-row justify-content-between gap-2 align-items-md-center">
        <div>
            <div class="fw-bold">Accesos rápidos</div>
            <div class="compact-help">Cambios frecuentes del sitio.</div>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.settings') }}" class="btn btn-primary btn-sm"><i class="bi bi-sliders me-2"></i>Editar inicio</a>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-plus-circle me-2"></i>Nuevo blog</a>
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-image me-2"></i>Subir imagen</a>
        </div>
    </div>
</div>

<div class="row g-3">
    @foreach([
        ['Blog', $posts, 'admin.posts.index', 'bi-newspaper', 'metric-blue', 'Artículos publicados y borradores'],
        ['Programas', $programs, 'admin.programs.index', 'bi-heart-pulse', 'metric-green', 'Servicios y programas activos'],
        ['Equipo', $team, 'admin.team.index', 'bi-people', 'metric-lilac', 'Integrantes visibles del equipo'],
        ['Galería', $gallery, 'admin.gallery.index', 'bi-images', 'metric-orange', 'Fotografías organizadas'],
        ['Mensajes sin leer', $unreadMessages, 'admin.messages', 'bi-envelope-paper', 'metric-orange', 'Solicitudes de contacto nuevas'],
        ['Voluntarios pendientes', $pendingVolunteers, 'admin.volunteers', 'bi-hand-thumbs-up', 'metric-green', 'Aplicaciones por revisar'],
    ] as [$label, $value, $route, $icon, $color, $hint])
        <div class="col-sm-6 col-xl-4">
            <a href="{{ route($route) }}" class="text-decoration-none">
                <div class="admin-card metric-card p-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <div class="metric-icon {{ $color }}"><i class="bi {{ $icon }}"></i></div>
                        <i class="bi bi-arrow-up-right text-muted"></i>
                    </div>
                    <div class="metric-value fw-bold mb-1">{{ $value }}</div>
                    <div class="fw-bold text-dark small">{{ $label }}</div>
                    <small class="text-muted d-block text-truncate">{{ $hint }}</small>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection
