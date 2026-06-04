@extends('admin.layout')

@section('title', $config['title'])

@section('content')
<div class="page-title">
    <div>
        <div class="eyebrow">Contenido</div>
        <h1 class="h2 fw-bold mb-1">{{ $config['title'] }}</h1>
        <p class="text-muted mb-0">Gestiona los registros de esta sección.</p>
    </div>
    <a href="{{ route("admin.{$resource}.create") }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle me-2"></i>Nuevo registro</a>
</div>

<div class="admin-card overflow-hidden">
    <div class="admin-card-header d-flex justify-content-between align-items-center">
        <div class="fw-bold">Registros</div>
        <span class="text-muted small">{{ $items->total() }} en total</span>
    </div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    @if(array_key_exists('image', $config['fields'] ?? []) || array_key_exists('photo', $config['fields'] ?? []))<th>Imagen</th>@endif
                    @foreach($config['columns'] as $label)<th>{{ $label }}</th>@endforeach
                    <th class="text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        @if(array_key_exists('image', $config['fields'] ?? []) || array_key_exists('photo', $config['fields'] ?? []))
                            @php($img = $item->image ?? $item->photo ?? null)
                            <td style="width:70px">
                                @if($img)
                                    <img src="{{ asset('images/'.$img) }}" class="preview-thumb" alt="">
                                @else
                                    <span class="preview-placeholder"><i class="bi bi-image"></i></span>
                                @endif
                            </td>
                        @endif
                        @foreach($config['columns'] as $key => $label)
                            <td>
                                @if(is_bool($item->{$key}))
                                    <span class="badge status-pill text-bg-{{ $item->{$key} ? 'success' : 'secondary' }}">{{ $item->{$key} ? 'Sí' : 'No' }}</span>
                                @elseif($item->{$key} instanceof \Carbon\Carbon)
                                    {{ $item->{$key}->format('d/m/Y') }}
                                @else
                                    {{ Str::limit((string) $item->{$key}, 70) }}
                                @endif
                            </td>
                        @endforeach
                        <td class="text-end">
                            <a href="{{ route("admin.{$resource}.edit", $item) }}" class="btn btn-sm btn-icon btn-outline-primary" title="Editar"><i class="bi bi-pencil"></i></a>
                            <form method="POST" action="{{ route("admin.{$resource}.destroy", $item) }}" class="d-inline" onsubmit="return confirm('¿Eliminar este registro?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-icon btn-outline-danger" title="Eliminar"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            <div class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <div class="fw-bold text-dark">Sin registros todavía</div>
                                <div>Cuando agregues contenido aparecerá aquí.</div>
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
