@extends('layouts.app')

@section('title', 'Donaciones')

@section('content')

<section class="bg-gradient-to-br from-accent-500 to-orange-700 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-5xl mb-4">❤️</div>
        <h1 class="text-4xl md:text-5xl font-heading font-extrabold mb-4">
            {{ $siteSettings['donation_title'] ?? 'Tu apoyo transforma vidas' }}
        </h1>
        <p class="text-xl text-orange-100 max-w-2xl mx-auto">
            {{ $siteSettings['donation_text'] ?? 'Cada aportación, grande o pequeña, nos permite seguir sembrando esperanza en quienes más lo necesitan.' }}
        </p>
    </div>
</section>

<section class="section-padding bg-warm-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Impacto --}}
        <div class="text-center mb-14">
            <h2 class="section-title">¿Qué logra tu donación?</h2>
            <div class="grid sm:grid-cols-3 gap-6 mt-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm text-center">
                    <p class="text-5xl font-bold text-accent-500 mb-2">🍽️</p>
                    <p class="font-semibold text-gray-800">$200 MXN</p>
                    <p class="text-gray-500 text-sm">Una despensa completa para una familia</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm text-center">
                    <p class="text-5xl font-bold text-secondary-500 mb-2">📚</p>
                    <p class="font-semibold text-gray-800">$500 MXN</p>
                    <p class="text-gray-500 text-sm">Material para un taller de capacitación</p>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm text-center">
                    <p class="text-5xl font-bold text-primary-500 mb-2">🏠</p>
                    <p class="font-semibold text-gray-800">$1,000 MXN</p>
                    <p class="text-gray-500 text-sm">Un mes de acompañamiento integral</p>
                </div>
            </div>
        </div>

        {{-- Datos bancarios --}}
        @if(!empty($siteSettings['donation_bank']) || !empty($siteSettings['donation_clabe']))
        <div class="bg-white rounded-3xl shadow-md p-8 mb-8">
            <h2 class="text-2xl font-heading font-bold text-gray-800 mb-6 flex items-center gap-2">
                🏦 Datos Bancarios
            </h2>
            <div class="space-y-4">
                @if(!empty($siteSettings['donation_bank']))
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-gray-500 font-medium">Banco</span>
                    <span class="font-semibold text-gray-800">{{ $siteSettings['donation_bank'] }}</span>
                </div>
                @endif
                @if(!empty($siteSettings['donation_account']))
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-gray-500 font-medium">Número de Cuenta</span>
                    <span class="font-mono font-semibold text-gray-800 text-lg">{{ $siteSettings['donation_account'] }}</span>
                </div>
                @endif
                @if(!empty($siteSettings['donation_clabe']))
                <div class="flex justify-between items-center py-3 border-b border-gray-100">
                    <span class="text-gray-500 font-medium">CLABE Interbancaria</span>
                    <span class="font-mono font-semibold text-gray-800 text-lg">{{ $siteSettings['donation_clabe'] }}</span>
                </div>
                @endif
                <div class="flex justify-between items-center py-3">
                    <span class="text-gray-500 font-medium">Beneficiario</span>
                    <span class="font-semibold text-gray-800">Sinergia de Amor y Esperanza A.C.</span>
                </div>
            </div>
            <p class="text-xs text-gray-400 mt-4 italic">Por favor envía tu comprobante de pago a: <a href="mailto:{{ $siteSettings['contact_email'] ?? '' }}" class="text-primary-600 hover:underline">{{ $siteSettings['contact_email'] ?? 'contacto@sinergiadamoriesperanza.org' }}</a></p>
        </div>
        @endif

        {{-- PayPal --}}
        @if(!empty($siteSettings['donation_paypal']))
        <div class="bg-blue-50 border border-blue-200 rounded-3xl p-8 mb-8 text-center">
            <h2 class="text-2xl font-heading font-bold text-blue-800 mb-4">💳 Donar con PayPal</h2>
            <p class="text-blue-700 mb-6">También puedes realizar tu donación de forma segura y rápida a través de PayPal.</p>
            <a href="{{ $siteSettings['donation_paypal'] }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-8 py-4 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 transition-colors shadow-md">
                Donar con PayPal
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>
        @endif

        {{-- Gracias --}}
        <div class="text-center bg-gradient-to-br from-primary-600 to-lilac-600 text-white rounded-3xl p-10">
            <p class="text-4xl mb-4">🙏</p>
            <h2 class="text-2xl font-heading font-bold mb-3">¡Gracias por tu generosidad!</h2>
            <p class="text-primary-100 mb-6">Tu apoyo es fundamental para que podamos seguir construyendo caminos de esperanza.</p>
            <p class="italic text-lg">"Porque cuando el amor y la esperanza se unen, nacen grandes cambios."</p>
        </div>
    </div>
</section>

@endsection
