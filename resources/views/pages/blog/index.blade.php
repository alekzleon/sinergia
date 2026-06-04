@extends('layouts.app')

@section('title', 'Blog / Noticias')

@section('content')

<section class="bg-gradient-warm text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-heading font-extrabold mb-4">Blog & Noticias</h1>
        <p class="text-xl text-primary-100">Actividades, historias y noticias de Sinergia de Amor y Esperanza A.C.</p>
    </div>
</section>

<section class="section-padding bg-warm-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($posts->count())
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <article class="card group">
                <div class="h-52 bg-gradient-warm overflow-hidden">
                    @if($post->image)
                        <img src="{{ asset('images/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-5xl text-white/80">📰</div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        @if($post->category)
                        <span class="badge badge-primary">{{ $post->category }}</span>
                        @endif
                        <span class="text-xs text-gray-400">{{ $post->reading_time }} min lectura</span>
                    </div>
                    <h2 class="font-heading font-bold text-gray-800 text-xl mb-2 group-hover:text-primary-600 transition-colors">
                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                    </h2>
                    @if($post->excerpt)
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ Str::limit($post->excerpt, 140) }}</p>
                    @endif
                    <div class="flex items-center justify-between text-xs text-gray-400 pt-3 border-t border-gray-100">
                        <span>{{ $post->author_name }}</span>
                        <span>{{ $post->published_at?->format('d M, Y') }}</span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        {{-- Paginación --}}
        @if($posts->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $posts->links() }}
        </div>
        @endif

        @else
        <div class="text-center py-20 text-gray-400">
            <p class="text-6xl mb-4">📝</p>
            <p class="text-xl">Próximamente compartiremos nuestras noticias aquí.</p>
        </div>
        @endif
    </div>
</section>

@endsection
