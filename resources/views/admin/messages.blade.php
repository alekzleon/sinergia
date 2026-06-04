@extends('admin.layout')

@section('title', 'Mensajes')

@section('content')
<div class="page-title">
    <div>
        <div class="eyebrow">Formularios</div>
        <h1 class="h2 fw-bold mb-1">Mensajes de contacto</h1>
        <p class="text-muted mb-0">Revisa las solicitudes enviadas desde el formulario del sitio.</p>
    </div>
</div>
<div class="admin-card overflow-hidden">
    <div class="admin-card-header d-flex justify-content-between align-items-center">
        <div class="fw-bold">Bandeja</div>
        <span class="text-muted small">{{ $items->total() }} mensajes</span>
    </div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead><tr><th>Estado</th><th>Nombre</th><th>Email</th><th>Asunto</th><th>Fecha</th><th></th></tr></thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td><span class="badge status-pill text-bg-{{ $item->is_read ? 'secondary' : 'warning' }}">{{ $item->is_read ? 'Leído' : 'Nuevo' }}</span></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ Str::limit($item->subject, 50) }}</td>
                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-end"><a href="{{ route('admin.messages.show', $item) }}" class="btn btn-sm btn-icon btn-outline-primary" title="Ver mensaje"><i class="bi bi-eye"></i></a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            <div class="empty-state">
                                <i class="bi bi-envelope-open"></i>
                                <div class="fw-bold text-dark">Sin mensajes por ahora</div>
                                <div>Los mensajes del formulario aparecerán aquí.</div>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3">{{ $items->links() }}</div>
@endsection
