@extends('layouts.app')

@section('title', 'Voluntarios')

@section('content')

<section class="bg-gradient-to-br from-secondary-600 to-primary-700 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-5xl mb-4">🙌</div>
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
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            @foreach([
                ['icon'=>'🌱', 'title'=>'Impacto Real', 'desc'=>'Cada hora que donas transforma una vida y siembra esperanza en comunidades vulnerables.'],
                ['icon'=>'🎓', 'title'=>'Aprendizaje', 'desc'=>'Desarrolla habilidades sociales, de liderazgo y trabajo en equipo en entornos reales.'],
                ['icon'=>'🤗', 'title'=>'Comunidad', 'desc'=>'Forma parte de una red de personas comprometidas y apasionadas por el bien común.'],
                ['icon'=>'📜', 'title'=>'Reconocimiento', 'desc'=>'Obtén constancias de participación y experiencia comprobable en servicio social.'],
            ] as $benefit)
            <div class="text-center p-6 bg-warm-50 rounded-2xl">
                <div class="text-4xl mb-3">{{ $benefit['icon'] }}</div>
                <h3 class="font-heading font-bold text-gray-800 mb-2">{{ $benefit['title'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $benefit['desc'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Formulario --}}
        <div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
            <h2 class="text-2xl font-heading font-bold text-gray-800 mb-2">Solicitud de Voluntariado</h2>
            <p class="text-gray-500 text-sm mb-6">Cuéntanos sobre ti y cómo quieres contribuir. Nos pondremos en contacto contigo pronto. ✨</p>

            @if(session('success'))
            <div class="bg-secondary-50 border border-secondary-200 text-secondary-800 rounded-xl p-4 mb-6 flex items-start gap-3">
                <svg class="w-5 h-5 text-secondary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('volunteer.store') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid sm:grid-cols-2 gap-5">
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
                </div>
                <div class="grid sm:grid-cols-3 gap-5">
                    <div>
                        <label class="form-label">Teléfono</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" class="form-input" placeholder="Opcional">
                    </div>
                    <div>
                        <label class="form-label">Edad</label>
                        <input type="number" name="age" value="{{ old('age') }}" class="form-input" min="15" max="99" placeholder="Tu edad">
                    </div>
                    <div>
                        <label class="form-label">Ciudad / Estado</label>
                        <input type="text" name="city" value="{{ old('city') }}" class="form-input" placeholder="Ej: CDMX">
                    </div>
                </div>
                <div>
                    <label class="form-label">Ocupación</label>
                    <input type="text" name="occupation" value="{{ old('occupation') }}" class="form-input" placeholder="Ej: Estudiante, maestro, psicólogo...">
                </div>
                <div>
                    <label class="form-label">Disponibilidad (selecciona los que apliquen)</label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mt-2">
                        @foreach(['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo','Fines de semana'] as $dia)
                        <label class="flex items-center gap-2 cursor-pointer bg-warm-50 rounded-lg px-3 py-2 hover:bg-primary-50 transition-colors">
                            <input type="checkbox" name="availability[]" value="{{ $dia }}" {{ in_array($dia, old('availability', [])) ? 'checked' : '' }} class="text-primary-600 rounded">
                            <span class="text-sm text-gray-700">{{ $dia }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div>
                    <label class="form-label">Áreas de interés / Habilidades</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 mt-2">
                        @foreach(['Apoyo comunitario','Talleres','Comunicación','Diseño','Psicología','Trabajo social','Educación','Logística','Redes sociales'] as $skill)
                        <label class="flex items-center gap-2 cursor-pointer bg-warm-50 rounded-lg px-3 py-2 hover:bg-secondary-50 transition-colors">
                            <input type="checkbox" name="skills[]" value="{{ $skill }}" {{ in_array($skill, old('skills', [])) ? 'checked' : '' }} class="text-secondary-600 rounded">
                            <span class="text-sm text-gray-700">{{ $skill }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div>
                    <label class="form-label">¿Por qué quieres ser voluntario? *</label>
                    <textarea name="motivation" rows="4" class="form-input @error('motivation') border-red-400 @enderror" placeholder="Cuéntanos tu motivación para unirte a nuestro equipo...">{{ old('motivation') }}</textarea>
                    @error('motivation')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="btn-secondary w-full justify-center">
                    Enviar mi Solicitud ✨
                </button>
            </form>
        </div>
    </div>
</section>

@endsection
