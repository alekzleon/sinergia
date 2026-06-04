@extends('admin.layout')

@section('title', 'Configuración')

@section('content')
<div class="page-title">
    <div>
        <div class="eyebrow">Ajustes globales</div>
        <h1 class="h2 fw-bold mb-1">Configuración del sitio</h1>
        <p class="text-muted mb-0">Controla los textos, datos de contacto e imágenes principales.</p>
    </div>
</div>

<form method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.update') }}">
    @csrf

    <div class="settings-savebar px-3 py-2 mb-3">
        <div class="d-flex flex-column flex-md-row justify-content-between gap-2 align-items-md-center">
            <div>
                <div class="fw-bold">Guardar cambios</div>
                <div class="compact-help">Los ajustes se aplican al sitio público.</div>
            </div>
            <button class="btn btn-primary btn-sm"><i class="bi bi-check-circle me-2"></i>Guardar configuración</button>
        </div>
    </div>

    <div class="admin-card overflow-hidden">
        <ul class="nav nav-tabs settings-tabs" id="settingsTabs" role="tablist">
            @foreach($groups as $group => $fields)
                @php($tabId = 'settings-tab-'.Str::slug($group))
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link @if($loop->first) active @endif"
                        id="{{ $tabId }}-button"
                        data-bs-toggle="tab"
                        data-bs-target="#{{ $tabId }}"
                        type="button"
                        role="tab"
                        aria-controls="{{ $tabId }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                    >
                        {{ $group }}
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content">
        @foreach($groups as $group => $fields)
            @php($tabId = 'settings-tab-'.Str::slug($group))
            <section
                class="tab-pane fade settings-tab-pane @if($loop->first) show active @endif"
                id="{{ $tabId }}"
                role="tabpanel"
                aria-labelledby="{{ $tabId }}-button"
                tabindex="0"
            >
                <div class="admin-card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="h5 fw-bold mb-0">{{ $group }}</h2>
                        <div class="compact-help">Edita solo los campos de esta sección.</div>
                    </div>
                    <span class="badge text-bg-light border">{{ count($fields) }} campos</span>
                </div>
                <div class="row p-3">
                @foreach($fields as $field)
                    @php($setting = $settings->get($field['key']))
                    @php($value = old($field['key'], $setting?->value))
                    <div class="{{ $field['type'] === 'textarea' || $field['type'] === 'image' ? 'col-12' : 'col-md-6' }}">
                        <label class="form-label">{{ $field['label'] }}</label>
                        @if($field['type'] === 'textarea')
                            <textarea name="{{ $field['key'] }}" rows="3" class="form-control">{{ $value }}</textarea>
                        @elseif($field['type'] === 'image')
                            @if($value)
                                <div class="mb-2 d-flex align-items-center gap-2 p-2 bg-light rounded-2 border">
                                    <img src="{{ asset('images/'.$value) }}" class="setting-preview" alt="">
                                    <small class="text-muted">Imagen actual</small>
                                </div>
                            @endif
                            <input type="file" name="{{ $field['key'] }}" class="form-control" accept="image/*">
                        @else
                            <input type="text" name="{{ $field['key'] }}" value="{{ $value }}" class="form-control">
                        @endif
                    </div>
                @endforeach
                </div>
            </section>
        @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-primary btn-sm"><i class="bi bi-check-circle me-2"></i>Guardar configuración</button>
    </div>
</form>
@endsection
