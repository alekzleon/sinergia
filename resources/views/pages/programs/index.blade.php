@extends('layouts.app')

@section('title', 'Programas y Servicios')

@section('content')

<section class="bg-gradient-to-br from-primary-600 to-lilac-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-heading font-extrabold mb-4">Nuestros Programas</h1>
        <p class="text-xl text-primary-100 max-w-2xl mx-auto">Trabajamos de forma integral para atender las diferentes necesidades de las personas que acompañamos.</p>
    </div>
</section>

<section class="section-padding bg-warm-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($programs->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-2 gap-8">
            @foreach($programs as $program)
            @php
                $colorMap = [
                    'primary'   => 'border-primary-400 bg-white',
                    'secondary' => 'border-secondary-400 bg-white',
                    'accent'    => 'border-accent-400 bg-white',
                    'lilac'     => 'border-purple-400 bg-white',
                ];
                $titleColor = [
                    'primary'   => 'text-primary-700',
                    'secondary' => 'text-secondary-700',
                    'accent'    => 'text-orange-700',
                    'lilac'     => 'text-purple-700',
                ];
            @endphp
            <div class="card border-t-4 {{ $colorMap[$program->color] ?? 'border-primary-400 bg-white' }} p-8 group">
                @if($program->image)
                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-48 object-cover rounded-xl mb-6">
                @endif
                <h2 class="font-heading font-bold text-2xl {{ $titleColor[$program->color] ?? 'text-primary-700' }} mb-3">{{ $program->title }}</h2>
                <p class="text-gray-600 leading-relaxed mb-6">{{ $program->short_description }}</p>
                <a href="{{ route('programs.show', $program->slug) }}" class="btn-primary">
                    Conoce más
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-20 text-gray-400">
            <p class="text-6xl mb-4">🌱</p>
            <p class="text-xl">Próximamente publicaremos nuestros programas.</p>
        </div>
        @endif
    </div>
</section>

@endsection
