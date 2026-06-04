@extends('layouts.app')

@section('title', $program->title)

@section('content')

<section class="bg-gradient-warm text-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('programs.index') }}" class="inline-flex items-center gap-2 text-primary-200 hover:text-white mb-6 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Volver a Programas
        </a>
        <h1 class="text-3xl md:text-4xl font-heading font-extrabold">{{ $program->title }}</h1>
    </div>
</section>

<section class="section-padding bg-warm-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($program->image)
        <img src="{{ asset('images/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-64 md:h-80 object-cover rounded-3xl shadow-lg mb-10">
        @endif
        <div class="bg-white rounded-3xl shadow-md p-8">
            <p class="text-xl text-gray-600 leading-relaxed mb-6 font-medium">{{ $program->short_description }}</p>
            @if($program->description)
            <div class="prose prose-lg text-gray-600 max-w-none">
                {!! $program->description !!}
            </div>
            @endif
        </div>

        <div class="mt-10 text-center">
            <p class="text-gray-600 mb-4">¿Te interesa este programa o quieres saber más?</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('contact.index') }}" class="btn-primary">Contáctanos</a>
                <a href="{{ route('volunteer.index') }}" class="btn-secondary">Ser Voluntario</a>
            </div>
        </div>
    </div>
</section>

@endsection
