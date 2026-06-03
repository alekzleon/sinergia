<?php $__env->startSection('title', 'Inicio'); ?>

<?php $__env->startSection('content'); ?>


<section class="relative min-h-screen flex items-center overflow-hidden">
    
    <div class="absolute inset-0">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($siteSettings['hero_image'])): ?>
            <img src="<?php echo e(asset('storage/' . $siteSettings['hero_image'])); ?>" alt="Fondo" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-hero"></div>
        <?php else: ?>
            <div class="absolute inset-0 bg-gradient-to-br from-primary-700 via-primary-600 to-lilac-600"></div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        
        <div class="absolute top-20 right-10 w-72 h-72 bg-secondary-400/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 left-10 w-56 h-56 bg-accent-400/20 rounded-full blur-2xl animate-float" style="animation-delay:1.5s"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 grid lg:grid-cols-2 gap-12 items-center">
        
        <div class="text-white" x-data x-intersect="$el.classList.add('animate-fade-in')">
            <span class="inline-block bg-secondary-500/30 border border-secondary-400/50 text-secondary-200 text-sm font-semibold px-4 py-1.5 rounded-full mb-6">
                Asociación Civil • Desde 2021
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-extrabold leading-tight mb-6">
                <?php echo e($siteSettings['hero_title'] ?? 'Juntos construimos caminos de esperanza'); ?>

            </h1>
            <p class="text-lg md:text-xl text-primary-100 leading-relaxed mb-10 max-w-xl">
                <?php echo e($siteSettings['hero_subtitle'] ?? 'Apoyamos a personas y familias en situación de vulnerabilidad mediante acciones integrales que promueven el bienestar, la inclusión y el desarrollo.'); ?>

            </p>
            <div class="flex flex-wrap gap-4">
                <a href="<?php echo e(route('programs.index')); ?>" class="btn-secondary">
                    <?php echo e($siteSettings['hero_cta_text'] ?? 'Conoce nuestro trabajo'); ?>

                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="<?php echo e(route('donations')); ?>" class="btn-outline">
                    <?php echo e($siteSettings['hero_cta2_text'] ?? 'Quiero donar'); ?> ❤️
                </a>
            </div>
        </div>

        
        <div class="hidden lg:flex justify-center">
            <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 max-w-sm w-full">
                <p class="text-white/80 text-sm font-semibold uppercase tracking-wider mb-6">Nuestro impacto</p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="text-center p-4 bg-white/10 rounded-2xl">
                        <p class="text-4xl font-bold text-secondary-300" data-counter><?php echo e($siteSettings['stat_families'] ?? '500+'); ?></p>
                        <p class="text-white/70 text-xs mt-1">Familias apoyadas</p>
                    </div>
                    <div class="text-center p-4 bg-white/10 rounded-2xl">
                        <p class="text-4xl font-bold text-accent-300" data-counter><?php echo e($siteSettings['stat_volunteers'] ?? '50+'); ?></p>
                        <p class="text-white/70 text-xs mt-1">Voluntarios</p>
                    </div>
                    <div class="text-center p-4 bg-white/10 rounded-2xl">
                        <p class="text-4xl font-bold text-lilac-300" data-counter><?php echo e($siteSettings['stat_programs'] ?? '10+'); ?></p>
                        <p class="text-white/70 text-xs mt-1">Programas activos</p>
                    </div>
                    <div class="text-center p-4 bg-white/10 rounded-2xl">
                        <p class="text-4xl font-bold text-primary-200" data-counter><?php echo e($siteSettings['stat_years'] ?? '5'); ?></p>
                        <p class="text-white/70 text-xs mt-1">Años de servicio</p>
                    </div>
                </div>
                <p class="text-center text-white/60 text-xs mt-6 italic">
                    "Porque cuando el amor y la esperanza se unen, nacen grandes cambios."
                </p>
            </div>
        </div>
    </div>

    
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 text-white/50 animate-bounce">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </div>
</section>


<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            
            <div class="relative">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($siteSettings['about_image'])): ?>
                    <img src="<?php echo e(asset('storage/' . $siteSettings['about_image'])); ?>" alt="Quiénes somos" class="rounded-3xl shadow-xl w-full h-96 object-cover">
                <?php else: ?>
                    <div class="rounded-3xl bg-gradient-hope w-full h-96 flex items-center justify-center shadow-xl">
                        <div class="text-center text-white p-10">
                            <div class="text-7xl mb-4">🌱</div>
                            <p class="text-xl font-bold">Sembrando esperanza desde 2021</p>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                
                <div class="absolute -bottom-5 -right-5 bg-secondary-500 text-white rounded-2xl px-5 py-3 shadow-lg font-heading font-bold text-center">
                    <p class="text-3xl font-extrabold"><?php echo e(($siteSettings['legal_year'] ?? '2026') - ($siteSettings['founded_year'] ?? '2021')); ?>+</p>
                    <p class="text-xs opacity-90">años de impacto</p>
                </div>
            </div>

            
            <div>
                <span class="badge badge-secondary mb-4">Nuestra Historia</span>
                <h2 class="section-title">¿Quiénes somos?</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    <?php echo e(Str::limit($siteSettings['about_history'] ?? 'Sinergia de Amor y Esperanza A.C. nace en abril del 2021, en medio de una etapa difícil para muchas familias debido a la crisis ocasionada por la pandemia.', 300)); ?>

                </p>
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-primary-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Inclusión</p>
                            <p class="text-gray-500 text-xs">Respetamos y valoramos a todas las personas</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-secondary-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Empatía</p>
                            <p class="text-gray-500 text-xs">Escuchamos y comprendemos cada necesidad</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-accent-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-accent-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Honestidad</p>
                            <p class="text-gray-500 text-xs">Transparencia en cada acción que realizamos</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Responsabilidad</p>
                            <p class="text-gray-500 text-xs">Comprometidos con nuestra misión</p>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(route('about')); ?>" class="btn-primary">
                    Conoce más sobre nosotros
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>


<section class="section-padding bg-warm-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="badge badge-primary mb-4">Filosofía Organizacional</span>
            <h2 class="section-title">Misión & Visión</h2>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            
            <div class="bg-white rounded-3xl p-8 shadow-md border-l-4 border-primary-500 hover:shadow-xl transition-shadow">
                <div class="w-14 h-14 bg-primary-100 rounded-2xl flex items-center justify-center mb-5">
                    <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-xl font-heading font-bold text-primary-700 mb-3">Nuestra Misión</h3>
                <p class="text-gray-600 leading-relaxed"><?php echo e($siteSettings['mission'] ?? 'Brindamos apoyo integral a grupos vulnerables en México, así como en el ámbito internacional, promoviendo su bienestar, inclusión y calidad de vida.'); ?></p>
            </div>
            
            <div class="bg-white rounded-3xl p-8 shadow-md border-l-4 border-secondary-500 hover:shadow-xl transition-shadow">
                <div class="w-14 h-14 bg-secondary-100 rounded-2xl flex items-center justify-center mb-5">
                    <svg class="w-7 h-7 text-secondary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-xl font-heading font-bold text-secondary-700 mb-3">Nuestra Visión</h3>
                <p class="text-gray-600 leading-relaxed"><?php echo e($siteSettings['vision'] ?? 'Para el año 2028, consolidarnos como una organización con presencia nacional e internacional, reconocida por su capacidad de brindar apoyo integral.'); ?></p>
            </div>
        </div>
    </div>
</section>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($programs->count()): ?>
<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="badge badge-secondary mb-4">Lo que hacemos</span>
            <h2 class="section-title">Nuestros Programas</h2>
            <p class="section-subtitle mx-auto">Trabajamos de forma integral para atender las diferentes necesidades de las personas que acompañamos.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $colorMap = [
                    'primary'   => ['bg' => 'bg-primary-50', 'icon' => 'bg-primary-100 text-primary-600', 'title' => 'text-primary-700'],
                    'secondary' => ['bg' => 'bg-green-50', 'icon' => 'bg-secondary-100 text-secondary-600', 'title' => 'text-secondary-700'],
                    'accent'    => ['bg' => 'bg-orange-50', 'icon' => 'bg-orange-100 text-orange-600', 'title' => 'text-orange-700'],
                    'lilac'     => ['bg' => 'bg-purple-50', 'icon' => 'bg-purple-100 text-purple-600', 'title' => 'text-purple-700'],
                ];
                $c = $colorMap[$program->color] ?? $colorMap['primary'];
            ?>
            <a href="<?php echo e(route('programs.show', $program->slug)); ?>" class="card-program <?php echo e($c['bg']); ?> group">
                <div class="w-12 h-12 <?php echo e($c['icon']); ?> rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="font-heading font-bold <?php echo e($c['title']); ?> mb-2 text-lg"><?php echo e($program->title); ?></h3>
                <p class="text-gray-600 text-sm leading-relaxed"><?php echo e($program->short_description); ?></p>
                <div class="flex items-center gap-1 mt-4 <?php echo e($c['title']); ?> text-sm font-semibold">
                    Ver más
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <div class="text-center mt-10">
            <a href="<?php echo e(route('programs.index')); ?>" class="btn-primary">Ver todos los programas</a>
        </div>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($team->count()): ?>
<section class="section-padding bg-warm-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="badge badge-primary mb-4">Las personas detrás</span>
            <h2 class="section-title">Nuestro Equipo</h2>
            <p class="section-subtitle mx-auto">Personas comprometidas con un mismo sueño: sembrar esperanza y transformar vidas.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card text-center p-8 group">
                <div class="w-24 h-24 rounded-full mx-auto mb-5 overflow-hidden bg-gradient-warm flex items-center justify-center text-white text-3xl font-bold shadow-md">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->photo): ?>
                        <img src="<?php echo e(asset('storage/' . $member->photo)); ?>" alt="<?php echo e($member->name); ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <?php echo e(substr($member->name, 0, 1)); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <h3 class="font-heading font-bold text-gray-800 text-lg mb-1"><?php echo e($member->name); ?></h3>
                <p class="text-primary-600 font-semibold text-sm mb-3"><?php echo e($member->role); ?></p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->bio): ?>
                <p class="text-gray-500 text-sm leading-relaxed"><?php echo e($member->bio); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <p class="text-center text-gray-500 italic mt-10 text-lg">✨ Unidos por una misma misión: sembrar esperanza y transformar vidas.</p>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($posts->count()): ?>
<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-14 gap-4">
            <div>
                <span class="badge badge-secondary mb-4">Noticias y Actividades</span>
                <h2 class="section-title mb-0">Blog</h2>
            </div>
            <a href="<?php echo e(route('blog.index')); ?>" class="btn-primary self-start sm:self-auto">Ver todo el blog</a>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="card group">
                <div class="h-48 bg-gradient-warm overflow-hidden">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->image): ?>
                        <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->title); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center text-5xl text-white/80">📰</div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="p-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->category): ?>
                    <span class="badge badge-primary mb-3"><?php echo e($post->category); ?></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <h3 class="font-heading font-bold text-gray-800 text-lg mb-2 group-hover:text-primary-600 transition-colors">
                        <a href="<?php echo e(route('blog.show', $post->slug)); ?>"><?php echo e($post->title); ?></a>
                    </h3>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->excerpt): ?>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4"><?php echo e(Str::limit($post->excerpt, 120)); ?></p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <div class="flex items-center justify-between text-xs text-gray-400">
                        <span><?php echo e($post->published_at?->format('d M, Y')); ?></span>
                        <a href="<?php echo e(route('blog.show', $post->slug)); ?>" class="text-primary-600 font-semibold hover:underline">Leer más →</a>
                    </div>
                </div>
            </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<section class="section-padding bg-gradient-to-r from-accent-500 to-orange-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-5xl mb-6">❤️</div>
        <h2 class="text-3xl md:text-4xl font-heading font-extrabold mb-4">
            <?php echo e($siteSettings['donation_title'] ?? 'Tu apoyo transforma vidas'); ?>

        </h2>
        <p class="text-lg text-white/90 max-w-2xl mx-auto mb-10">
            <?php echo e($siteSettings['donation_text'] ?? 'Cada aportación, grande o pequeña, nos permite seguir sembrando esperanza en quienes más lo necesitan.'); ?>

        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="<?php echo e(route('donations')); ?>" class="bg-white text-accent-600 font-bold px-8 py-4 rounded-full hover:shadow-xl hover:-translate-y-0.5 transition-all">
                Quiero Donar Ahora
            </a>
            <a href="<?php echo e(route('volunteer.index')); ?>" class="border-2 border-white text-white font-bold px-8 py-4 rounded-full hover:bg-white/10 transition-all">
                Ser Voluntario
            </a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/alejandroleon/Documents/PROYECTOS CLIENTES/SINERGIA-WEB/resources/views/pages/home.blade.php ENDPATH**/ ?>