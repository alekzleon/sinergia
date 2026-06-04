<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', $siteSettings['site_name'] ?? 'Sinergia de Amor y Esperanza A.C.') — {{ $siteSettings['site_tagline'] ?? 'Donde florece la esperanza' }}</title>
    <meta name="description" content="@yield('meta_description', $siteSettings['site_description'] ?? 'Asociación civil comprometida con el apoyo integral a personas y familias en situación de vulnerabilidad.')">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', $siteSettings['site_name'] ?? 'Sinergia de Amor y Esperanza A.C.')">
    <meta property="og:description" content="@yield('meta_description', $siteSettings['site_description'] ?? '')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">

    <!-- Favicon -->
    @if(!empty($siteSettings['site_favicon']))
        <link rel="icon" type="image/x-icon" href="{{ asset('images/' . $siteSettings['site_favicon']) }}">
    @endif

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50: '#EBF3FB', 100: '#C8DCF3', 200: '#9DC0E8', 300: '#71A3DC', 400: '#5B90CF', 500: '#4A7DB5', 600: '#3D6A9A', 700: '#30567E', 800: '#234162', 900: '#162D46' },
                        secondary: { 50: '#F1F8E9', 100: '#DCEDC8', 200: '#C5E1A5', 300: '#AED581', 400: '#9CCC65', 500: '#7CB342', 600: '#6EA039', 700: '#558B2F', 800: '#3D7A26', 900: '#26691C' },
                        accent: { 50: '#FFF3E0', 100: '#FFE0B2', 200: '#FFCC80', 300: '#FFB74D', 400: '#FFA726', 500: '#FF8C00', 600: '#F57C00', 700: '#E65100', 800: '#BF360C', 900: '#8D1C0A' },
                        lilac: { 50: '#F3E5F5', 100: '#E1BEE7', 200: '#CE93D8', 300: '#BA68C8', 400: '#AB47BC', 500: '#9575CD', 600: '#7E57C2', 700: '#673AB7', 800: '#512DA8', 900: '#311B92' },
                        warm: { 50: '#FAFAF8', 100: '#F5F4F0', 200: '#ECEAE3', 300: '#E0DDD4' },
                    },
                    fontFamily: {
                        sans: ['Inter', 'Nunito', 'sans-serif'],
                        heading: ['Nunito', 'Inter', 'sans-serif'],
                    },
                    backgroundImage: {
                        'gradient-warm': 'linear-gradient(135deg, #4A7DB5 0%, #9575CD 100%)',
                        'gradient-hope': 'linear-gradient(135deg, #7CB342 0%, #4A7DB5 100%)',
                        'gradient-hero': 'linear-gradient(to bottom right, rgba(74,125,181,0.85), rgba(149,117,205,0.75))',
                    },
                },
            },
        };
    </script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600&display=swap">
    <style>
        body { font-family: Inter, Nunito, sans-serif; color: #374151; }
        h1, h2, h3, h4, h5, h6, .font-heading { font-family: Nunito, Inter, sans-serif; }
        .btn-primary { display: inline-flex; align-items: center; gap: .5rem; padding: .75rem 1.5rem; background: #4A7DB5; color: #fff; font-weight: 600; border-radius: 9999px; box-shadow: 0 4px 6px rgb(0 0 0 / .1); transition: all .3s; }
        .btn-secondary { display: inline-flex; align-items: center; gap: .5rem; padding: .75rem 1.5rem; background: #7CB342; color: #fff; font-weight: 600; border-radius: 9999px; box-shadow: 0 4px 6px rgb(0 0 0 / .1); transition: all .3s; }
        .btn-outline { display: inline-flex; align-items: center; gap: .5rem; padding: .75rem 1.5rem; border: 2px solid #fff; color: #fff; font-weight: 600; border-radius: 9999px; transition: all .3s; }
        .btn-accent { display: inline-flex; align-items: center; gap: .5rem; padding: .75rem 1.5rem; background: #FF8C00; color: #fff; font-weight: 600; border-radius: 9999px; box-shadow: 0 4px 6px rgb(0 0 0 / .1); transition: all .3s; }
        .hero-section { position: relative; min-height: 100vh; display: flex; align-items: center; background: linear-gradient(to bottom right, rgba(74,125,181,0.85), rgba(149,117,205,0.75)); color: #fff; overflow: hidden; }
        .card, .card-program { background: #fff; border-radius: 1rem; box-shadow: 0 4px 6px rgb(0 0 0 / .1); transition: all .3s; overflow: hidden; }
        .card-program { padding: 1.5rem; border: 1px solid #f3f4f6; }
        .section-padding { padding-top: 4rem; padding-bottom: 4rem; }
        @media (min-width: 768px) { .section-padding { padding-top: 6rem; padding-bottom: 6rem; } }
        .section-title { font-size: 1.875rem; line-height: 2.25rem; font-weight: 700; color: #3D6A9A; margin-bottom: 1rem; }
        @media (min-width: 768px) { .section-title { font-size: 2.25rem; line-height: 2.5rem; } }
        .section-subtitle { font-size: 1.125rem; color: #6b7280; max-width: 42rem; }
        .nav-link { color: #374151; font-weight: 500; transition: color .2s; position: relative; }
        .whatsapp-btn { position: fixed; bottom: 1.5rem; right: 1.5rem; z-index: 50; width: 3.5rem; height: 3.5rem; background: #22c55e; color: #fff; border-radius: 9999px; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 15px rgb(0 0 0 / .1); }
        .badge { display: inline-block; padding: .25rem .75rem; border-radius: 9999px; font-size: .875rem; font-weight: 600; }
        .badge-primary { background: #C8DCF3; color: #30567E; }
        .badge-secondary { background: #DCEDC8; color: #558B2F; }
        .badge-accent { background: #FFE0B2; color: #E65100; }
        .badge-lilac { background: #E1BEE7; color: #673AB7; }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-warm-50" x-data="{ menuOpen: false }">

    <!-- ── Navbar ──────────────────────────────────────────────────────────── -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0">
                    @if(!empty($siteSettings['site_logo']))
                        <img src="{{ asset('images/' . $siteSettings['site_logo']) }}" alt="{{ $siteSettings['site_name'] ?? 'Sinergia A.C.' }}" class="h-12 w-auto">
                    @else
                        <div class="w-12 h-12 rounded-full bg-gradient-warm flex items-center justify-center text-white font-bold text-lg shadow">S</div>
                        <div class="hidden sm:block">
                            <p class="font-heading font-bold text-primary-600 leading-tight text-sm">Sinergia de Amor</p>
                            <p class="font-heading font-bold text-primary-600 leading-tight text-sm">y Esperanza A.C.</p>
                        </div>
                    @endif
                </a>

                <!-- Nav links (desktop) -->
                <div class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="nav-link @if(request()->routeIs('home')) text-primary-600 @endif">Inicio</a>
                    <a href="{{ route('about') }}" class="nav-link @if(request()->routeIs('about')) text-primary-600 @endif">Quiénes Somos</a>
                    <a href="{{ route('programs.index') }}" class="nav-link @if(request()->routeIs('programs.*')) text-primary-600 @endif">Programas</a>
                    <a href="{{ route('gallery.index') }}" class="nav-link @if(request()->routeIs('gallery.*')) text-primary-600 @endif">Galería</a>
                    <a href="{{ route('blog.index') }}" class="nav-link @if(request()->routeIs('blog.*')) text-primary-600 @endif">Blog</a>
                    <a href="{{ route('volunteer.index') }}" class="nav-link @if(request()->routeIs('volunteer.*')) text-primary-600 @endif">Voluntarios</a>
                    <a href="{{ route('contact.index') }}" class="nav-link @if(request()->routeIs('contact.*')) text-primary-600 @endif">Contacto</a>
                </div>

                <!-- CTA Donar -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('donations') }}" class="btn-accent text-sm px-5 py-2.5">
                        ❤️ Donar
                    </a>
                </div>

                <!-- Hamburger (mobile) -->
                <button @click="menuOpen = !menuOpen" class="lg:hidden p-2 rounded-lg text-gray-600 hover:bg-gray-100 transition-colors" aria-label="Menú">
                    <svg x-show="!menuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="menuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="menuOpen" x-transition class="lg:hidden border-t border-gray-100 py-4 space-y-1">
                <a href="{{ route('home') }}" class="block px-4 py-2.5 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg font-medium">Inicio</a>
                <a href="{{ route('about') }}" class="block px-4 py-2.5 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg font-medium">Quiénes Somos</a>
                <a href="{{ route('programs.index') }}" class="block px-4 py-2.5 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg font-medium">Programas</a>
                <a href="{{ route('gallery.index') }}" class="block px-4 py-2.5 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg font-medium">Galería</a>
                <a href="{{ route('blog.index') }}" class="block px-4 py-2.5 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg font-medium">Blog</a>
                <a href="{{ route('volunteer.index') }}" class="block px-4 py-2.5 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg font-medium">Voluntarios</a>
                <a href="{{ route('contact.index') }}" class="block px-4 py-2.5 text-gray-700 hover:text-primary-600 hover:bg-primary-50 rounded-lg font-medium">Contacto</a>
                <div class="px-4 pt-2">
                    <a href="{{ route('donations') }}" class="btn-accent w-full justify-center text-sm">❤️ Quiero Donar</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ── Contenido principal ─────────────────────────────────────────────── -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- ── Footer ─────────────────────────────────────────────────────────── -->
    <footer class="bg-primary-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <!-- Columna 1: Logo y descripción -->
                <div>
                    <a href="{{ route('home') }}" class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white font-bold text-lg">S</div>
                        <div>
                            <p class="font-heading font-bold text-white leading-tight text-sm">Sinergia de Amor</p>
                            <p class="font-heading font-bold text-white leading-tight text-sm">y Esperanza A.C.</p>
                        </div>
                    </a>
                    <p class="text-primary-200 text-sm leading-relaxed mb-5 max-w-xs">
                        {{ $siteSettings['site_tagline'] ?? 'Donde florece la esperanza, renace una nueva vida.' }}
                    </p>
                    <!-- Redes sociales -->
                    <div class="flex gap-3">
                        @if(!empty($siteSettings['social_facebook']))
                        <a href="{{ $siteSettings['social_facebook'] }}" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors" aria-label="Facebook">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        @endif
                        @if(!empty($siteSettings['social_instagram']))
                        <a href="{{ $siteSettings['social_instagram'] }}" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors" aria-label="Instagram">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        @endif
                        @if(!empty($siteSettings['social_youtube']))
                        <a href="{{ $siteSettings['social_youtube'] }}" target="_blank" rel="noopener" class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors" aria-label="YouTube">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Columna 2: Links rápidos -->
                <div>
                    <h4 class="font-heading font-bold text-white mb-4">Navegación</h4>
                    <ul class="space-y-2 text-sm text-primary-200">
                        <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">Quiénes Somos</a></li>
                        <li><a href="{{ route('mision-vision') }}" class="hover:text-white transition-colors">Misión y Visión</a></li>
                        <li><a href="{{ route('programs.index') }}" class="hover:text-white transition-colors">Programas</a></li>
                        <li><a href="{{ route('blog.index') }}" class="hover:text-white transition-colors">Blog / Noticias</a></li>
                        <li><a href="{{ route('gallery.index') }}" class="hover:text-white transition-colors">Galería</a></li>
                        <li><a href="{{ route('volunteer.index') }}" class="hover:text-white transition-colors">Voluntarios</a></li>
                        <li><a href="{{ route('donations') }}" class="hover:text-white transition-colors">Donaciones</a></li>
                        <li><a href="{{ route('contact.index') }}" class="hover:text-white transition-colors">Contacto</a></li>
                    </ul>
                </div>

                <!-- Columna 3: Contacto -->
                <div>
                    <h4 class="font-heading font-bold text-white mb-4">Contacto</h4>
                    <ul class="space-y-3 text-sm text-primary-200">
                        @if(!empty($siteSettings['contact_email']))
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:{{ $siteSettings['contact_email'] }}" class="hover:text-white transition-colors break-all">{{ $siteSettings['contact_email'] }}</a>
                        </li>
                        @endif
                        @if(!empty($siteSettings['contact_phone']))
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>{{ $siteSettings['contact_phone'] }}</span>
                        </li>
                        @endif
                        @if(!empty($siteSettings['contact_address']))
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>{{ $siteSettings['contact_address'] }}</span>
                        </li>
                        @endif
                    </ul>

                    <div class="mt-6">
                        <a href="{{ route('donations') }}" class="btn-accent text-sm w-full justify-center">
                            ❤️ Apoya nuestra causa
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer bottom -->
            <div class="border-t border-primary-600 mt-12 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-sm text-primary-300">
                <p>© {{ date('Y') }} Sinergia de Amor y Esperanza A.C. Todos los derechos reservados.</p>
                <p class="italic text-center sm:text-right">✨ Porque cuando el amor y la esperanza se unen, nacen grandes cambios.</p>
            </div>
        </div>
        <div class="bg-white/95 border-t border-primary-100 py-2 text-center text-[10px] sm:text-xs text-gray-400">
            Sitio desarrollado por 
            <a href="https://cloudi.mx" target="_blank" rel="noopener" class="font-medium text-gray-500 border-b border-accent-200 hover:text-primary-600 transition-colors">
                cloudi.mx
            </a>
        </div>
    </footer>

    <!-- ── Botón flotante WhatsApp ──────────────────────────────────────────── -->
    @if(!empty($siteSettings['contact_whatsapp']))
    <a href="https://wa.me/{{ preg_replace('/\D/', '', $siteSettings['contact_whatsapp']) }}?text={{ urlencode($siteSettings['whatsapp_message'] ?? 'Hola, me comunico desde el sitio web de Sinergia de Amor y Esperanza A.C.') }}"
       target="_blank" rel="noopener" class="whatsapp-btn" aria-label="WhatsApp">
        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
    </a>
    @endif

</body>
</html>
