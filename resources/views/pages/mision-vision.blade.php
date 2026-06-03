@extends('layouts.app')

@section('title', 'Misión y Visión')

@section('content')

<section class="bg-gradient-hope text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-heading font-extrabold mb-4">Misión & Visión</h1>
        <p class="text-xl text-green-100">Nuestra filosofía organizacional y los valores que guían nuestro actuar.</p>
    </div>
</section>

<section class="section-padding bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        {{-- Misión --}}
        <div class="bg-primary-50 border-l-4 border-primary-500 rounded-2xl p-8">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-primary-500 rounded-xl flex items-center justify-center text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h2 class="text-2xl font-heading font-bold text-primary-700">Misión</h2>
            </div>
            <p class="text-gray-700 text-lg leading-relaxed">{{ $siteSettings['mission'] ?? 'Brindamos apoyo integral a grupos vulnerables en México, así como en el ámbito internacional, promoviendo su bienestar, inclusión y calidad de vida.' }}</p>
        </div>

        {{-- Visión --}}
        <div class="bg-secondary-50 border-l-4 border-secondary-500 rounded-2xl p-8">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-secondary-500 rounded-xl flex items-center justify-center text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h2 class="text-2xl font-heading font-bold text-secondary-700">Visión</h2>
            </div>
            <p class="text-gray-700 text-lg leading-relaxed">{{ $siteSettings['vision'] ?? 'Para el año 2028, consolidarnos como una organización con presencia nacional e internacional, reconocida por su capacidad de brindar apoyo integral.' }}</p>
        </div>

        {{-- Valores --}}
        <div>
            <h2 class="text-2xl font-heading font-bold text-gray-800 mb-6">Valores Organizacionales</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach([
                    ['name'=>'Responsabilidad', 'icon'=>'🤝', 'color'=>'bg-primary-50 border-primary-200', 'desc'=>'Cumplimos con nuestros compromisos de manera ética y profesional, asumiendo con seriedad el impacto de nuestras acciones y promoviendo un trato justo y humano en cada actividad.'],
                    ['name'=>'Respeto', 'icon'=>'🌟', 'color'=>'bg-secondary-50 border-secondary-200', 'desc'=>'Reconocemos y valoramos la dignidad, diversidad y derechos de todas las personas, fomentando relaciones basadas en la igualdad y la inclusión.'],
                    ['name'=>'Honestidad', 'icon'=>'💎', 'color'=>'bg-orange-50 border-orange-200', 'desc'=>'Actuamos con transparencia, rectitud y coherencia, generando confianza en nuestras relaciones y en el trabajo que realizamos.'],
                    ['name'=>'Empatía', 'icon'=>'💛', 'color'=>'bg-yellow-50 border-yellow-200', 'desc'=>'Nos ponemos en el lugar del otro, escuchando y comprendiendo sus necesidades para brindar un apoyo sensible y humano.'],
                    ['name'=>'Confianza', 'icon'=>'🔒', 'color'=>'bg-purple-50 border-purple-200', 'desc'=>'Construimos vínculos sólidos basados en la transparencia, la coherencia y la credibilidad, creando un ambiente seguro.'],
                ] as $valor)
                <div class="{{ $valor['color'] }} border rounded-2xl p-6">
                    <div class="text-3xl mb-3">{{ $valor['icon'] }}</div>
                    <h3 class="font-heading font-bold text-gray-800 text-lg mb-2">{{ $valor['name'] }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $valor['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Código de ética (resumen) --}}
        <div class="bg-primary-700 text-white rounded-3xl p-8 text-center">
            <h3 class="text-2xl font-heading font-bold mb-4">Código de Ética</h3>
            <p class="text-primary-200 leading-relaxed max-w-3xl mx-auto">
                Este Código de Ética es aplicable a todas las personas que colaboran en Sinergia de Amor y Esperanza A.C., incluyendo personal operativo, directivo, voluntariado y consejo. La aplicación ética no depende únicamente de sanciones, sino del compromiso genuino de quienes integramos esta organización, fortaleciendo una cultura basada en la responsabilidad social, el respeto y la solidaridad.
            </p>
        </div>
    </div>
</section>

@endsection
