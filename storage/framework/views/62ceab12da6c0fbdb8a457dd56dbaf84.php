<?php $__env->startSection('title', 'Voluntarios'); ?>

<?php $__env->startSection('content'); ?>

<section class="bg-gradient-to-br from-secondary-600 to-primary-700 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-5xl mb-4">🙌</div>
        <h1 class="text-4xl md:text-5xl font-heading font-extrabold mb-4">Área de Voluntarios</h1>
        <p class="text-xl text-green-100 max-w-2xl mx-auto">Únete a nuestra red de voluntarios y sé parte del cambio que México necesita.</p>
    </div>
</section>


<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="section-title">¿Por qué ser voluntario con nosotros?</h2>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [
                ['icon'=>'🌱', 'title'=>'Impacto Real', 'desc'=>'Cada hora que donas transforma una vida y siembra esperanza en comunidades vulnerables.'],
                ['icon'=>'🎓', 'title'=>'Aprendizaje', 'desc'=>'Desarrolla habilidades sociales, de liderazgo y trabajo en equipo en entornos reales.'],
                ['icon'=>'🤗', 'title'=>'Comunidad', 'desc'=>'Forma parte de una red de personas comprometidas y apasionadas por el bien común.'],
                ['icon'=>'📜', 'title'=>'Reconocimiento', 'desc'=>'Obtén constancias de participación y experiencia comprobable en servicio social.'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="text-center p-6 bg-warm-50 rounded-2xl">
                <div class="text-4xl mb-3"><?php echo e($benefit['icon']); ?></div>
                <h3 class="font-heading font-bold text-gray-800 mb-2"><?php echo e($benefit['title']); ?></h3>
                <p class="text-gray-500 text-sm"><?php echo e($benefit['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-lg p-8 border border-gray-100">
            <h2 class="text-2xl font-heading font-bold text-gray-800 mb-2">Solicitud de Voluntariado</h2>
            <p class="text-gray-500 text-sm mb-6">Cuéntanos sobre ti y cómo quieres contribuir. Nos pondremos en contacto contigo pronto. ✨</p>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
            <div class="bg-secondary-50 border border-secondary-200 text-secondary-800 rounded-xl p-4 mb-6 flex items-start gap-3">
                <svg class="w-5 h-5 text-secondary-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <form action="<?php echo e(route('volunteer.store')); ?>" method="POST" class="space-y-5">
                <?php echo csrf_field(); ?>
                <div class="grid sm:grid-cols-2 gap-5">
                    <div>
                        <label class="form-label">Nombre completo *</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Tu nombre">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div>
                        <label class="form-label">Correo electrónico *</label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="tu@email.com">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <div class="grid sm:grid-cols-3 gap-5">
                    <div>
                        <label class="form-label">Teléfono</label>
                        <input type="tel" name="phone" value="<?php echo e(old('phone')); ?>" class="form-input" placeholder="Opcional">
                    </div>
                    <div>
                        <label class="form-label">Edad</label>
                        <input type="number" name="age" value="<?php echo e(old('age')); ?>" class="form-input" min="15" max="99" placeholder="Tu edad">
                    </div>
                    <div>
                        <label class="form-label">Ciudad / Estado</label>
                        <input type="text" name="city" value="<?php echo e(old('city')); ?>" class="form-input" placeholder="Ej: CDMX">
                    </div>
                </div>
                <div>
                    <label class="form-label">Ocupación</label>
                    <input type="text" name="occupation" value="<?php echo e(old('occupation')); ?>" class="form-input" placeholder="Ej: Estudiante, maestro, psicólogo...">
                </div>
                <div>
                    <label class="form-label">Disponibilidad (selecciona los que apliquen)</label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mt-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo','Fines de semana']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="flex items-center gap-2 cursor-pointer bg-warm-50 rounded-lg px-3 py-2 hover:bg-primary-50 transition-colors">
                            <input type="checkbox" name="availability[]" value="<?php echo e($dia); ?>" <?php echo e(in_array($dia, old('availability', [])) ? 'checked' : ''); ?> class="text-primary-600 rounded">
                            <span class="text-sm text-gray-700"><?php echo e($dia); ?></span>
                        </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <div>
                    <label class="form-label">Áreas de interés / Habilidades</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 mt-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = ['Apoyo comunitario','Talleres','Comunicación','Diseño','Psicología','Trabajo social','Educación','Logística','Redes sociales']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="flex items-center gap-2 cursor-pointer bg-warm-50 rounded-lg px-3 py-2 hover:bg-secondary-50 transition-colors">
                            <input type="checkbox" name="skills[]" value="<?php echo e($skill); ?>" <?php echo e(in_array($skill, old('skills', [])) ? 'checked' : ''); ?> class="text-secondary-600 rounded">
                            <span class="text-sm text-gray-700"><?php echo e($skill); ?></span>
                        </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                <div>
                    <label class="form-label">¿Por qué quieres ser voluntario? *</label>
                    <textarea name="motivation" rows="4" class="form-input <?php $__errorArgs = ['motivation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Cuéntanos tu motivación para unirte a nuestro equipo..."><?php echo e(old('motivation')); ?></textarea>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['motivation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <button type="submit" class="btn-secondary w-full justify-center">
                    Enviar mi Solicitud ✨
                </button>
            </form>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/alejandroleon/Documents/PROYECTOS CLIENTES/SINERGIA-WEB/resources/views/pages/volunteer.blade.php ENDPATH**/ ?>