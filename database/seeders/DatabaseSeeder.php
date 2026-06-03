<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Program;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin user ────────────────────────────────────────────────────────
        User::firstOrCreate(
            ['email' => 'admin@sinergiadamoriesperanza.org'],
            [
                'name'     => 'Administrador Sinergia',
                'password' => Hash::make('SinergiaAdmin2024!'),
            ]
        );

        // ── Site Settings ─────────────────────────────────────────────────────
        $settings = [
            // General
            ['key' => 'site_name',        'value' => 'Sinergia de Amor y Esperanza A.C.', 'type' => 'text',    'group' => 'general', 'label' => 'Nombre del sitio'],
            ['key' => 'site_tagline',     'value' => 'Donde florece la esperanza, renace una nueva vida.', 'type' => 'text', 'group' => 'general', 'label' => 'Slogan'],
            ['key' => 'site_description', 'value' => 'Asociación civil comprometida con el apoyo integral a personas y familias en situación de vulnerabilidad en México.', 'type' => 'textarea', 'group' => 'general', 'label' => 'Descripción del sitio'],
            ['key' => 'site_logo',        'value' => '',   'type' => 'image',   'group' => 'general', 'label' => 'Logo del sitio'],
            ['key' => 'site_favicon',     'value' => '',   'type' => 'image',   'group' => 'general', 'label' => 'Favicon'],

            // Hero / Inicio
            ['key' => 'hero_image',       'value' => '',   'type' => 'image',   'group' => 'hero', 'label' => 'Imagen de fondo del Hero'],
            ['key' => 'hero_title',       'value' => 'Juntos construimos caminos de esperanza', 'type' => 'text', 'group' => 'hero', 'label' => 'Título del Hero'],
            ['key' => 'hero_subtitle',    'value' => 'Apoyamos a personas y familias en situación de vulnerabilidad mediante acciones integrales que promueven el bienestar, la inclusión y el desarrollo.', 'type' => 'textarea', 'group' => 'hero', 'label' => 'Subtítulo del Hero'],
            ['key' => 'hero_cta_text',    'value' => 'Conoce nuestro trabajo', 'type' => 'text', 'group' => 'hero', 'label' => 'Texto del botón principal'],
            ['key' => 'hero_cta2_text',   'value' => 'Quiero donar',           'type' => 'text', 'group' => 'hero', 'label' => 'Texto del botón secundario'],

            // About / Quiénes somos
            ['key' => 'about_image',      'value' => '',   'type' => 'image',   'group' => 'about', 'label' => 'Imagen sección Quiénes Somos'],
            ['key' => 'about_history',    'value' => 'Sinergia de Amor y Esperanza A.C. nace en abril del 2021, en medio de una etapa difícil para muchas familias debido a la crisis ocasionada por la pandemia. Surge como un proyecto solidario integrado por personas comprometidas con apoyar a quienes enfrentaban situaciones de vulnerabilidad y dificultades económicas.', 'type' => 'textarea', 'group' => 'about', 'label' => 'Historia de la asociación'],
            ['key' => 'mission',          'value' => 'Brindamos apoyo integral a grupos vulnerables en México, así como en el ámbito internacional, promoviendo su bienestar, inclusión y calidad de vida.', 'type' => 'textarea', 'group' => 'about', 'label' => 'Misión'],
            ['key' => 'vision',           'value' => 'Para el año 2028, consolidarnos como una organización con presencia nacional e internacional, reconocida por su capacidad de brindar apoyo integral a las personas y familias, priorizando a quienes se encuentran en situación de vulnerabilidad.', 'type' => 'textarea', 'group' => 'about', 'label' => 'Visión'],
            ['key' => 'founded_year',     'value' => '2021', 'type' => 'text',  'group' => 'about', 'label' => 'Año de fundación'],
            ['key' => 'legal_year',       'value' => '2026', 'type' => 'text',  'group' => 'about', 'label' => 'Año de constitución legal'],

            // Contact
            ['key' => 'contact_email',    'value' => 'contacto@sinergiadamoriesperanza.org', 'type' => 'text', 'group' => 'contact', 'label' => 'Email de contacto'],
            ['key' => 'contact_phone',    'value' => '',   'type' => 'text',    'group' => 'contact', 'label' => 'Teléfono'],
            ['key' => 'contact_whatsapp', 'value' => '',   'type' => 'text',    'group' => 'contact', 'label' => 'WhatsApp (con código de país, ej: 521XXXXXXXXXX)'],
            ['key' => 'contact_address',  'value' => 'México', 'type' => 'text','group' => 'contact', 'label' => 'Dirección'],
            ['key' => 'contact_city',     'value' => '',   'type' => 'text',    'group' => 'contact', 'label' => 'Ciudad/Estado'],
            ['key' => 'google_maps_url',  'value' => '',   'type' => 'url',     'group' => 'contact', 'label' => 'URL de Google Maps'],

            // Social
            ['key' => 'social_facebook',  'value' => '',   'type' => 'url',     'group' => 'social', 'label' => 'Facebook'],
            ['key' => 'social_instagram', 'value' => '',   'type' => 'url',     'group' => 'social', 'label' => 'Instagram'],
            ['key' => 'social_twitter',   'value' => '',   'type' => 'url',     'group' => 'social', 'label' => 'Twitter / X'],
            ['key' => 'social_youtube',   'value' => '',   'type' => 'url',     'group' => 'social', 'label' => 'YouTube'],
            ['key' => 'social_tiktok',    'value' => '',   'type' => 'url',     'group' => 'social', 'label' => 'TikTok'],

            // Donaciones
            ['key' => 'donation_title',   'value' => 'Tu apoyo transforma vidas', 'type' => 'text', 'group' => 'donations', 'label' => 'Título sección donaciones'],
            ['key' => 'donation_text',    'value' => 'Cada aportación, grande o pequeña, nos permite seguir sembrando esperanza en quienes más lo necesitan.', 'type' => 'textarea', 'group' => 'donations', 'label' => 'Texto donaciones'],
            ['key' => 'donation_bank',    'value' => '',   'type' => 'text',    'group' => 'donations', 'label' => 'Banco'],
            ['key' => 'donation_clabe',   'value' => '',   'type' => 'text',    'group' => 'donations', 'label' => 'CLABE interbancaria'],
            ['key' => 'donation_account', 'value' => '',   'type' => 'text',    'group' => 'donations', 'label' => 'Número de cuenta'],
            ['key' => 'donation_paypal',  'value' => '',   'type' => 'url',     'group' => 'donations', 'label' => 'Link de PayPal'],

            // Stats (números en homepage)
            ['key' => 'stat_families',    'value' => '500+',  'type' => 'text', 'group' => 'stats', 'label' => 'Familias apoyadas'],
            ['key' => 'stat_volunteers',  'value' => '50+',   'type' => 'text', 'group' => 'stats', 'label' => 'Voluntarios'],
            ['key' => 'stat_programs',    'value' => '10+',   'type' => 'text', 'group' => 'stats', 'label' => 'Programas activos'],
            ['key' => 'stat_years',       'value' => '5',     'type' => 'text', 'group' => 'stats', 'label' => 'Años de servicio'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        // ── Team Members ──────────────────────────────────────────────────────
        $team = [
            ['name' => 'Ruth Bravo Ramírez',        'role' => 'Presidenta Fundadora',  'bio' => 'Comprometida con el apoyo social, la inclusión y el acompañamiento a personas y familias en situación de vulnerabilidad.', 'order' => 1],
            ['name' => 'Arturo Hernández Acosta',   'role' => 'Tesorero',              'bio' => 'Responsable de la administración y manejo transparente de los recursos de la asociación.', 'order' => 2],
            ['name' => 'Alexis Michelle Aceves Bravo', 'role' => 'Comité de Vigilancia', 'bio' => 'Encargada de supervisar y fortalecer el cumplimiento ético, organizacional y transparente de la asociación.', 'order' => 3],
        ];

        foreach ($team as $member) {
            TeamMember::firstOrCreate(['name' => $member['name']], $member + ['is_active' => true]);
        }

        // ── Programs ──────────────────────────────────────────────────────────
        $programs = [
            [
                'title'             => 'Asistencia Básica y Despensas',
                'slug'              => 'asistencia-basica',
                'short_description' => 'Entrega de despensas y apoyo básico a familias en situación de vulnerabilidad y dificultades económicas.',
                'icon'              => 'heroicon-o-heart',
                'color'             => 'accent',
                'order'             => 1,
            ],
            [
                'title'             => 'Acompañamiento y Orientación',
                'slug'              => 'acompanamiento-orientacion',
                'short_description' => 'Espacios de apoyo, escucha y fortalecimiento personal para quienes atraviesan situaciones difíciles.',
                'icon'              => 'heroicon-o-hand-raised',
                'color'             => 'primary',
                'order'             => 2,
            ],
            [
                'title'             => 'Empoderamiento Personal',
                'slug'              => 'empoderamiento-personal',
                'short_description' => 'Programas para descubrir capacidades, fortalecer la autoestima y desarrollar herramientas para mejorar la calidad de vida.',
                'icon'              => 'heroicon-o-star',
                'color'             => 'secondary',
                'order'             => 3,
            ],
            [
                'title'             => 'Talleres y Capacitación',
                'slug'              => 'talleres-capacitacion',
                'short_description' => 'Talleres presenciales y virtuales de aprendizaje, desarrollo de habilidades y capacitación para el trabajo.',
                'icon'              => 'heroicon-o-academic-cap',
                'color'             => 'lilac',
                'order'             => 4,
            ],
        ];

        foreach ($programs as $program) {
            Program::firstOrCreate(['slug' => $program['slug']], $program + ['is_active' => true]);
        }
    }
}
