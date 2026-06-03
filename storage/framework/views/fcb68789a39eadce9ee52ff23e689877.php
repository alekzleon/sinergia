<?php $__env->startSection('title', 'Quiénes Somos'); ?>

<?php $__env->startSection('content'); ?>


<section class="bg-gradient-warm text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="badge bg-white/20 text-white mb-4">Nuestra Historia</span>
        <h1 class="text-4xl md:text-5xl font-heading font-extrabold mb-4">Quiénes Somos</h1>
        <p class="text-xl text-primary-100 max-w-2xl mx-auto"><?php echo e($siteSettings['site_tagline'] ?? 'Donde florece la esperanza, renace una nueva vida.'); ?></p>
    </div>
</section>


<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-start">
            <div>
                <h2 class="section-title">Nuestra Historia</h2>
                <div class="prose prose-lg text-gray-600 max-w-none">
                    <?php echo nl2br(e($siteSettings['about_history'] ?? '')); ?>

                </div>
                <div class="mt-8 flex gap-6">
                    <div class="text-center">
                        <p class="text-4xl font-bold text-primary-600"><?php echo e($siteSettings['founded_year'] ?? '2021'); ?></p>
                        <p class="text-sm text-gray-500">Año de fundación</p>
                    </div>
                    <div class="w-px bg-gray-200"></div>
                    <div class="text-center">
                        <p class="text-4xl font-bold text-secondary-600"><?php echo e($siteSettings['legal_year'] ?? '2026'); ?></p>
                        <p class="text-sm text-gray-500">Constitución legal A.C.</p>
                    </div>
                </div>
            </div>
            <div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($siteSettings['about_image'])): ?>
                    <img src="<?php echo e(asset('storage/' . $siteSettings['about_image'])); ?>" alt="Sinergia A.C." class="rounded-3xl shadow-xl w-full object-cover">
                <?php else: ?>
                    <div class="bg-gradient-hope rounded-3xl h-80 flex items-center justify-center text-white text-6xl shadow-xl">🌱</div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</section>


<section class="section-padding bg-warm-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="section-title">Valores Organizacionales</h2>
            <p class="section-subtitle mx-auto">Los valores que guían nuestro actuar institucional.</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
                ['icon'=>'🤝', 'name'=>'Responsabilidad', 'color'=>'primary', 'desc'=>'Cumplimos con nuestros compromisos de manera ética y profesional, asumiendo con seriedad el impacto de nuestras acciones.'],
                ['icon'=>'🌟', 'name'=>'Respeto', 'color'=>'secondary', 'desc'=>'Reconocemos y valoramos la dignidad, diversidad y derechos de todas las personas, fomentando relaciones basadas en la igualdad.'],
                ['icon'=>'💎', 'name'=>'Honestidad', 'color'=>'accent', 'desc'=>'Actuamos con transparencia, rectitud y coherencia, generando confianza en nuestras relaciones y en el trabajo que realizamos.'],
                ['icon'=>'💛', 'name'=>'Empatía', 'color'=>'lilac', 'desc'=>'Nos ponemos en el lugar del otro, escuchando y comprendiendo sus necesidades para brindar un apoyo sensible y humano.'],
                ['icon'=>'🔒', 'name'=>'Confianza', 'color'=>'primary', 'desc'=>'Construimos vínculos sólidos basados en la transparencia, la coherencia y la credibilidad, creando un ambiente seguro.'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition-shadow">
                <div class="text-3xl mb-3"><?php echo e($valor['icon']); ?></div>
                <h3 class="font-heading font-bold text-gray-800 text-lg mb-2"><?php echo e($valor['name']); ?></h3>
                <p class="text-gray-500 text-sm leading-relaxed"><?php echo e($valor['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($team->count()): ?>
<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <span class="badge badge-primary mb-4">Quienes nos dirigen</span>
            <h2 class="section-title">Nuestro Equipo</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card text-center p-8">
                <div class="w-28 h-28 rounded-full mx-auto mb-5 overflow-hidden bg-gradient-warm flex items-center justify-center text-white text-4xl font-bold shadow-lg">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->photo): ?>
                        <img src="<?php echo e(asset('storage/' . $member->photo)); ?>" alt="<?php echo e($member->name); ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <?php echo e(substr($member->name, 0, 1)); ?>

                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <h3 class="font-heading font-bold text-gray-800 text-xl mb-1"><?php echo e($member->name); ?></h3>
                <p class="text-primary-600 font-semibold mb-3"><?php echo e($member->role); ?></p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->bio): ?>
                <p class="text-gray-500 text-sm leading-relaxed"><?php echo e($member->bio); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->email || $member->linkedin || $member->facebook): ?>
                <div class="flex justify-center gap-3 mt-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->email): ?>
                    <a href="mailto:<?php echo e($member->email); ?>" class="text-gray-400 hover:text-primary-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
        <p class="text-center text-gray-400 italic mt-10 text-lg">✨ Unidos por una misma misión: sembrar esperanza y transformar vidas.</p>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<section class="section-padding bg-primary-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-heading font-extrabold mb-4">Transparencia y Rendición de Cuentas</h2>
            <p class="text-primary-200 leading-relaxed">
                En Sinergia de Amor y Esperanza A.C. entendemos la transparencia como una expresión concreta de nuestra ética institucional. Compartimos información clara, veraz y accesible sobre nuestras acciones, decisiones y resultados.
            </p>
        </div>
        <div class="grid sm:grid-cols-3 gap-6">
            <div class="bg-white/10 rounded-2xl p-5 text-center">
                <div class="text-3xl mb-2">📊</div>
                <p class="font-semibold">Información Financiera Accesible</p>
            </div>
            <div class="bg-white/10 rounded-2xl p-5 text-center">
                <div class="text-3xl mb-2">📋</div>
                <p class="font-semibold">Informes Periódicos de Resultados</p>
            </div>
            <div class="bg-white/10 rounded-2xl p-5 text-center">
                <div class="text-3xl mb-2">💬</div>
                <p class="font-semibold">Cultura de Diálogo Abierto</p>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/alejandroleon/Documents/PROYECTOS CLIENTES/SINERGIA-WEB/resources/views/pages/about.blade.php ENDPATH**/ ?>