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
                        @php($textareaValue = old($name, is_array($item->{$name}) ? implode(', ', $item->{$name}) : $item->{$name}))
                        @if($resource === 'posts' && $name === 'content')
                            <div class="editor-shell @error($name) border-danger @enderror" data-rich-editor>
                                <div class="editor-toolbar" aria-label="Herramientas de edición">
                                    <select data-editor-command="formatBlock" title="Formato">
                                        <option value="p">Párrafo</option>
                                        <option value="h2">Título 2</option>
                                        <option value="h3">Título 3</option>
                                        <option value="blockquote">Cita</option>
                                    </select>
                                    <button type="button" data-editor-command="bold" title="Negrita"><i class="bi bi-type-bold"></i></button>
                                    <button type="button" data-editor-command="italic" title="Cursiva"><i class="bi bi-type-italic"></i></button>
                                    <button type="button" data-editor-command="underline" title="Subrayado"><i class="bi bi-type-underline"></i></button>
                                    <button type="button" data-editor-command="insertUnorderedList" title="Lista"><i class="bi bi-list-ul"></i></button>
                                    <button type="button" data-editor-command="insertOrderedList" title="Lista numerada"><i class="bi bi-list-ol"></i></button>
                                    <button type="button" data-editor-command="justifyLeft" title="Alinear izquierda"><i class="bi bi-text-left"></i></button>
                                    <button type="button" data-editor-command="justifyCenter" title="Centrar"><i class="bi bi-text-center"></i></button>
                                    <button type="button" data-editor-command="justifyRight" title="Alinear derecha"><i class="bi bi-text-right"></i></button>
                                    <button type="button" data-editor-action="link" title="Insertar enlace"><i class="bi bi-link-45deg"></i></button>
                                    <button type="button" data-editor-command="removeFormat" title="Limpiar formato"><i class="bi bi-eraser"></i></button>
                                </div>
                                <div class="rich-editor" contenteditable="true" data-placeholder="Escribe el contenido del blog...">{!! $textareaValue !!}</div>
                                <textarea name="{{ $name }}" class="d-none @error($name) is-invalid @enderror" data-editor-input>{{ $textareaValue }}</textarea>
                            </div>
                        @else
                            <textarea name="{{ $name }}" rows="4" class="form-control @error($name) is-invalid @enderror">{{ $textareaValue }}</textarea>
                        @endif
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
                        <input
                            type="{{ $inputType }}"
                            name="{{ $name }}"
                            value="{{ $value }}"
                            class="form-control @error($name) is-invalid @enderror @if($name === 'slug') slug-lock @endif"
                            @if($name === 'title') data-slug-title @endif
                            @if($name === 'slug') readonly data-slug-target aria-describedby="{{ $name }}Help" @endif
                        >
                        @if($name === 'slug')
                            <div id="{{ $name }}Help" class="compact-help mt-1">Se genera automáticamente desde el título.</div>
                        @endif
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const slugTitle = document.querySelector('[data-slug-title]');
    const slugTarget = document.querySelector('[data-slug-target]');

    const slugify = (value) => value
        .toString()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-+|-+$/g, '')
        .replace(/-{2,}/g, '-');

    if (slugTitle && slugTarget) {
        slugTarget.value = slugify(slugTitle.value);
        slugTitle.addEventListener('input', () => {
            slugTarget.value = slugify(slugTitle.value);
        });
    }

    document.querySelectorAll('[data-rich-editor]').forEach((shell) => {
        const editor = shell.querySelector('.rich-editor');
        const input = shell.querySelector('[data-editor-input]');
        const sync = () => input.value = editor.innerHTML.trim();

        shell.querySelectorAll('[data-editor-command]').forEach((control) => {
            control.addEventListener('click', () => {
                if (control.tagName === 'SELECT') return;
                document.execCommand(control.dataset.editorCommand, false, null);
                editor.focus();
                sync();
            });

            control.addEventListener('change', () => {
                document.execCommand(control.dataset.editorCommand, false, control.value);
                editor.focus();
                sync();
            });
        });

        shell.querySelector('[data-editor-action="link"]')?.addEventListener('click', () => {
            const url = window.prompt('URL del enlace');
            if (!url) return;
            document.execCommand('createLink', false, url);
            editor.focus();
            sync();
        });

        editor.addEventListener('input', sync);
        editor.closest('form')?.addEventListener('submit', sync);
        sync();
    });
});
</script>
@endpush
