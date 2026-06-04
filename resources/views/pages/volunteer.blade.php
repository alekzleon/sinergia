@extends('layouts.app')

@section('title', 'Voluntarios')

@section('content')

<section class="bg-gradient-to-br from-secondary-600 to-primary-700 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-heading font-extrabold mb-4">Área de Voluntarios</h1>
        <p class="text-xl text-green-100 max-w-2xl mx-auto">Únete a nuestra red de voluntarios y sé parte del cambio que México necesita.</p>
    </div>
</section>

{{-- Por qué ser voluntario --}}
<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="section-title">¿Por qué ser voluntario con nosotros?</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-12">
            @foreach([
                ['icon'=>'01', 'title'=>'Impacto Real', 'desc'=>'Cada hora que donas transforma una vida y siembra esperanza en comunidades vulnerables.'],
                ['icon'=>'02', 'title'=>'Aprendizaje', 'desc'=>'Desarrolla habilidades sociales, de liderazgo y trabajo en equipo en entornos reales.'],
                ['icon'=>'03', 'title'=>'Comunidad', 'desc'=>'Forma parte de una red de personas comprometidas y apasionadas por el bien común.'],
                ['icon'=>'04', 'title'=>'Reconocimiento', 'desc'=>'Obtén constancias de participación y experiencia comprobable en servicio social.'],
            ] as $benefit)
            <div class="p-5 bg-warm-50 rounded-2xl border border-warm-100">
                <div class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-secondary-100 text-secondary-700 text-sm font-bold mb-3">{{ $benefit['icon'] }}</div>
                <h3 class="font-heading font-bold text-gray-800 mb-2">{{ $benefit['title'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $benefit['desc'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Formulario --}}
        <div class="max-w-6xl mx-auto grid lg:grid-cols-[320px_1fr] gap-6 items-start">
            <aside class="bg-primary-700 text-white rounded-2xl p-6 lg:sticky lg:top-24">
                <p class="text-primary-100 text-sm font-semibold uppercase tracking-wide mb-2">Solicitud</p>
                <h2 class="text-2xl font-heading font-bold mb-3">Voluntariado</h2>
                <p class="text-primary-100 text-sm leading-relaxed mb-6">Completa tus datos por secciones. Revisaremos tu solicitud y te contactaremos para definir la mejor forma de colaborar.</p>
                <div class="space-y-3 text-sm">
                    <div class="flex gap-3">
                        <span class="h-7 w-7 rounded-full bg-white/15 flex items-center justify-center font-bold">1</span>
                        <span class="pt-1">Datos personales</span>
                    </div>
                    <div class="flex gap-3">
                        <span class="h-7 w-7 rounded-full bg-white/15 flex items-center justify-center font-bold">2</span>
                        <span class="pt-1">Disponibilidad</span>
                    </div>
                    <div class="flex gap-3">
                        <span class="h-7 w-7 rounded-full bg-white/15 flex items-center justify-center font-bold">3</span>
                        <span class="pt-1">Intereses y motivación</span>
                    </div>
                </div>
            </aside>

            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="px-6 sm:px-8 py-6 border-b border-gray-100">
                    <h2 class="text-2xl font-heading font-bold text-gray-800 mb-2">Solicitud de Voluntariado</h2>
                    <p class="text-gray-500 text-sm mb-0">Cuéntanos sobre ti y cómo quieres contribuir.</p>
                </div>

            @if(session('success'))
            <div class="mx-6 sm:mx-8 mt-6 bg-secondary-50 border border-secondary-200 text-secondary-800 rounded-xl p-4 flex items-start gap-3">
                <svg class="w-5 h-5 text-secondary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('volunteer.store') }}" method="POST" class="p-6 sm:p-8 space-y-8">
                @csrf
                <section>
                    <div class="mb-4">
                        <h3 class="font-heading font-bold text-gray-800">Datos personales</h3>
                        <p class="text-sm text-gray-500">Información básica para poder contactarte.</p>
                    </div>
                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="form-label">Nombre completo *</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-input @error('name') border-red-400 @enderror" placeholder="Tu nombre">
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label">Correo electrónico *</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-input @error('email') border-red-400 @enderror" placeholder="tu@email.com">
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label">Teléfono</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" class="form-input" placeholder="Opcional">
                        </div>
                        <div>
                            <label class="form-label">Ciudad / Estado</label>
                            <input type="text" name="city" value="{{ old('city') }}" class="form-input" placeholder="Ej: CDMX">
                        </div>
                        <div>
                            <label class="form-label">Edad</label>
                            <input type="number" name="age" value="{{ old('age') }}" class="form-input" min="15" max="99" placeholder="Tu edad">
                        </div>
                        <div>
                            <label class="form-label">Ocupación</label>
                            <input type="text" name="occupation" value="{{ old('occupation') }}" class="form-input" placeholder="Ej: Estudiante, maestro, psicólogo...">
                        </div>
                    </div>
                </section>

                <section class="border-t border-gray-100 pt-6">
                    <div class="mb-4">
                        <h3 class="font-heading font-bold text-gray-800">Disponibilidad</h3>
                        <p class="text-sm text-gray-500">Selecciona los días en los que podrías participar.</p>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                        @foreach(['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo','Fines de semana'] as $dia)
                        <label class="option-chip flex items-center gap-2 cursor-pointer px-3 py-2 transition-colors">
                            <input type="checkbox" name="availability[]" value="{{ $dia }}" {{ in_array($dia, old('availability', [])) ? 'checked' : '' }} class="text-primary-600 rounded">
                            <span class="text-sm text-gray-700">{{ $dia }}</span>
                        </label>
                        @endforeach
                    </div>
                </section>

                <section class="border-t border-gray-100 pt-6">
                    <div class="mb-4">
                        <h3 class="font-heading font-bold text-gray-800">Áreas de interés / habilidades</h3>
                        <p class="text-sm text-gray-500">Elige las áreas donde te gustaría apoyar.</p>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach(['Apoyo comunitario','Talleres','Comunicación','Diseño','Psicología','Trabajo social','Educación','Logística','Redes sociales'] as $skill)
                        <label class="option-chip flex items-center gap-2 cursor-pointer px-3 py-2 transition-colors">
                            <input type="checkbox" name="skills[]" value="{{ $skill }}" {{ in_array($skill, old('skills', [])) ? 'checked' : '' }} class="text-secondary-600 rounded">
                            <span class="text-sm text-gray-700">{{ $skill }}</span>
                        </label>
                        @endforeach
                    </div>
                </section>

                <section class="border-t border-gray-100 pt-6">
                    <div class="mb-4">
                        <h3 class="font-heading font-bold text-gray-800">Motivación</h3>
                        <p class="text-sm text-gray-500">Cuéntanos por qué quieres sumarte.</p>
                    </div>
                    <label class="form-label">¿Por qué quieres ser voluntario? *</label>
                    <textarea name="motivation" rows="5" class="form-input @error('motivation') border-red-400 @enderror" placeholder="Cuéntanos tu motivación para unirte a nuestro equipo...">{{ old('motivation') }}</textarea>
                    @error('motivation')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </section>

                <div class="border-t border-gray-100 pt-6 flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between">
                    <p class="text-xs text-gray-500">Los campos marcados con * son obligatorios.</p>
                    <button type="submit" class="btn-secondary justify-center">
                        Enviar mi solicitud
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>

@endsection
