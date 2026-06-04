@extends('admin.layout')

@section('title', $item->exists ? 'Editar '.$config['title'] : 'Nuevo '.$config['title'])

@section('content')
<div class="page-title">
    <div>
        <div class="eyebrow">{{ $item->exists ? 'Edición' : 'Nuevo contenido' }}</div>
        <h1 class="h2 fw-bold mb-1">{{ $item->exists ? 'Editar' : 'Nuevo' }} {{ $config['title'] }}</h1>
        <p class="text-muted mb-0">Completa la información y guarda los cambios.</p>
    </div>
    <a href="{{ route("admin.{$resource}.index") }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-2"></i>Volver</a>
</div>

<form method="POST" enctype="multipart/form-data" action="{{ $item->exists ? route("admin.{$resource}.update", $item) : route("admin.{$resource}.store") }}" class="admin-card overflow-hidden">
    @csrf
    @if($item->exists) @method('PUT') @endif
    <div class="admin-card-header">
        <div class="fw-bold">Información</div>
    </div>
    <div class="row g-3 p-3">
        @foreach($config['fields'] as $name => $field)
            @php($type = $field['type'] ?? 'text')
            <div class="{{ in_array($type, ['textarea', 'file'], true) ? 'col-12' : 'col-md-6' }}">
                @if($type === 'checkbox')
                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" name="{{ $name }}" value="1" id="{{ $name }}" @checked(old($name, $item->{$name}) )>
                        <label class="form-check-label" for="{{ $name }}">{{ $field['label'] }}</label>
                    </div>
                @else
                    <label class="form-label">{{ $field['label'] }}</label>
                    @if($type === 'textarea')
                        <textarea name="{{ $name }}" rows="4" class="form-control @error($name) is-invalid @enderror">{{ old($name, is_array($item->{$name}) ? implode(', ', $item->{$name}) : $item->{$name}) }}</textarea>
                    @elseif($type === 'select')
                        <select name="{{ $name }}" class="form-select">
                            <option value="">Seleccionar</option>
                            @foreach($field['options'] as $value => $label)
                                <option value="{{ $value }}" @selected(old($name, $item->{$name}) === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                    @elseif($type === 'file')
                        @if($item->{$name})
                            <div class="mb-2 d-flex align-items-center gap-2 p-2 bg-light rounded-2 border">
                                <img src="{{ asset('images/'.$item->{$name}) }}" class="setting-preview" alt="">
                                <div>
                                    <div class="fw-bold small">Imagen actual</div>
                                    <small class="text-muted">Al subir otra imagen se reemplazará esta.</small>
                                </div>
                            </div>
                        @endif
                        <input type="file" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" accept="image/*">
                    @else
                        @php($inputType = $type === 'datetime' ? 'datetime-local' : ($type === 'number' ? 'number' : 'text'))
                        @php($value = old($name, $type === 'datetime' && $item->{$name} ? $item->{$name}->format('Y-m-d\TH:i') : (is_array($item->{$name}) ? implode(', ', $item->{$name}) : $item->{$name})))
                        <input type="{{ $inputType }}" name="{{ $name }}" value="{{ $value }}" class="form-control @error($name) is-invalid @enderror">
                    @endif
                    @error($name)<div class="invalid-feedback">{{ $message }}</div>@enderror
                @endif
            </div>
        @endforeach
    </div>
    <div class="admin-card-header d-flex flex-wrap gap-2 justify-content-end">
        <button class="btn btn-primary btn-sm"><i class="bi bi-check-circle me-2"></i>Guardar</button>
        <a href="{{ route("admin.{$resource}.index") }}" class="btn btn-outline-secondary btn-sm">Cancelar</a>
    </div>
</form>
@endsection
