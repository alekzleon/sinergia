@extends('admin.layout')

@section('title', 'Voluntarios')

@section('content')
<div class="page-title">
    <div>
        <div class="eyebrow">Formularios</div>
        <h1 class="h2 fw-bold mb-1">Solicitudes de voluntariado</h1>
        <p class="text-muted mb-0">Da seguimiento a personas interesadas en colaborar.</p>
    </div>
</div>
<div class="admin-card overflow-hidden">
    <div class="admin-card-header d-flex justify-content-between align-items-center">
        <div class="fw-bold">Solicitudes</div>
        <span class="text-muted small">{{ $items->total() }} en total</span>
    </div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead><tr><th>Nombre</th><th>Email</th><th>Ciudad</th><th>Motivación</th><th>Estado</th><th>Fecha</th></tr></thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>{{ $item->name }}<br><small class="text-muted">{{ $item->phone }}</small></td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->city }}</td>
                        <td>{{ Str::limit($item->motivation, 80) }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.volunteers.update', $item) }}">
                                @csrf @method('PATCH')
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    @foreach(['pending' => 'Pendiente', 'reviewing' => 'En revisión', 'accepted' => 'Aceptado', 'rejected' => 'Rechazado'] as $value => $label)
                                        <option value="{{ $value }}" @selected($item->status === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            <div class="empty-state">
                                <i class="bi bi-person-heart"></i>
                                <div class="fw-bold text-dark">Sin solicitudes todavía</div>
                                <div>Las personas interesadas aparecerán en esta lista.</div>
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
