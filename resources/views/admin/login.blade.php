@extends('admin.layout')

@section('title', 'Login')

@section('content')
<div class="login-canvas">
    <div class="login-card" style="max-width: 920px">
        <div class="admin-card overflow-hidden">
            <div class="row g-0">
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="login-aside h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="brand-dot mb-4">S</div>
                            <h1 class="h2 fw-bold mb-3">Sinergia A.C.</h1>
                            <p class="mb-0 text-white-50">Panel privado para mantener vivo el contenido, mensajes y programas del sitio.</p>
                        </div>
                        <div class="d-grid gap-3 mt-5">
                            <div class="d-flex gap-3 align-items-center">
                                <i class="bi bi-newspaper fs-4"></i>
                                <span>Blog, programas y galería</span>
                            </div>
                            <div class="d-flex gap-3 align-items-center">
                                <i class="bi bi-envelope-paper fs-4"></i>
                                <span>Mensajes y voluntarios</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="p-4 p-md-5">
                        <div class="mb-4">
                            <div class="brand-dot d-lg-none mb-3">S</div>
                            <div class="eyebrow">Acceso administrativo</div>
                            <h1 class="h3 fw-bold mb-1">Bienvenido</h1>
                            <p class="text-muted mb-0">Ingresa con tu cuenta para continuar.</p>
                        </div>
                        <form method="POST" action="{{ route('admin.login.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control border-start-0 @error('email') is-invalid @enderror" required autofocus>
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="password" class="form-control border-start-0" required>
                                </div>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Mantener sesión iniciada</label>
                            </div>
                            <button class="btn btn-primary w-100 py-2">
                                <i class="bi bi-arrow-right-circle me-2"></i>Entrar al panel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
