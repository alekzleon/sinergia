@extends('admin.layout')

@section('title', 'Mensaje')

@section('content')
<div class="page-title">
    <div>
        <div class="eyebrow">Mensaje</div>
        <h1 class="h2 fw-bold mb-1">Mensaje de contacto</h1>
        <p class="text-muted mb-0">Recibido el {{ $message->created_at->format('d/m/Y H:i') }}.</p>
    </div>
    <a href="{{ route('admin.messages') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-2"></i>Volver</a>
</div>
<div class="admin-card overflow-hidden">
    <div class="admin-card-header">
        <h2 class="h5 fw-bold mb-0">{{ $message->subject ?: 'Sin asunto' }}</h2>
    </div>
    <div class="p-4">
        <div class="row g-3 mb-4">
            <div class="col-md-6"><span class="text-muted small d-block">Nombre</span><strong>{{ $message->name }}</strong></div>
            <div class="col-md-6"><span class="text-muted small d-block">Email</span><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></div>
            <div class="col-md-6"><span class="text-muted small d-block">Teléfono</span><strong>{{ $message->phone ?: 'N/A' }}</strong></div>
            <div class="col-md-6"><span class="text-muted small d-block">Fecha</span><strong>{{ $message->created_at->format('d/m/Y H:i') }}</strong></div>
        </div>
        <div class="p-3 bg-light rounded-2 border" style="white-space: pre-line">{{ $message->message }}</div>
    </div>
</div>
@endsection
