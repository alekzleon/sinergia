@extends('layouts.app')

@section('title', 'Galería')

@section('content')

<section class="bg-gradient-warm text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-heading font-extrabold mb-4">Galería</h1>
        <p class="text-xl text-primary-100">Momentos de esperanza, amor y acción comunitaria.</p>
    </div>
</section>

<section class="section-padding bg-warm-50" x-data="{ activeCategory: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Filtros --}}
        @if($categories->count() > 0)
        <div class="flex flex-wrap justify-center gap-3 mb-10">
            <button @click="activeCategory = 'all'" :class="activeCategory === 'all' ? 'bg-primary-600 text-white' : 'bg-white text-gray-600 hover:bg-primary-50'" class="px-5 py-2 rounded-full font-medium transition-all shadow-sm">
                Todas
            </button>
            @foreach($categories as $cat)
            <button @click="activeCategory = '{{ $cat }}'" :class="activeCategory === '{{ $cat }}' ? 'bg-primary-600 text-white' : 'bg-white text-gray-600 hover:bg-primary-50'" class="px-5 py-2 rounded-full font-medium transition-all shadow-sm capitalize">
                {{ $cat }}
            </button>
            @endforeach
        </div>
        @endif

        @if($images->count())
        <div class="columns-2 sm:columns-3 lg:columns-4 gap-4 space-y-4">
            @foreach($images as $image)
            <div x-show="activeCategory === 'all' || activeCategory === '{{ $image->category }}'"
                 class="break-inside-avoid cursor-zoom-in group relative overflow-hidden rounded-2xl shadow-md hover:shadow-xl transition-all">
                <img src="{{ asset('storage/' . $image->image) }}"
                     alt="{{ $image->title ?? $image->caption ?? 'Galería Sinergia' }}"
                     data-lightbox="{{ asset('storage/' . $image->image) }}"
                     class="w-full object-cover group-hover:scale-105 transition-transform duration-500">
                @if($image->caption || $image->title)
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                    <p class="text-white text-sm font-medium">{{ $image->title ?? $image->caption }}</p>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-20 text-gray-400">
            <p class="text-6xl mb-4">📸</p>
            <p class="text-xl">Próximamente compartiremos nuestros momentos aquí.</p>
        </div>
        @endif
    </div>
</section>

@endsection
