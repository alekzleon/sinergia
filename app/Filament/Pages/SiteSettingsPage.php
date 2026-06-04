<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SiteSettingsPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Configuración del Sitio';
    protected static ?string $navigationGroup = 'Configuración';
    protected static ?int    $navigationSort  = 1;
    protected static string  $view            = 'filament.pages.site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $keys = SiteSetting::all()->pluck('value', 'key')->toArray();
        $this->form->fill($keys);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Configuración')->tabs([

                    Tabs\Tab::make('General')->schema([
                        TextInput::make('site_name')->label('Nombre del sitio')->required(),
                        TextInput::make('site_tagline')->label('Slogan'),
                        Textarea::make('site_description')->label('Descripción meta')->rows(3),
                        FileUpload::make('site_logo')->label('Logo del sitio')->image()->directory('settings')->disk('images'),
                        FileUpload::make('site_favicon')->label('Favicon')->image()->directory('settings')->disk('images'),
                    ]),

                    Tabs\Tab::make('Hero / Inicio')->schema([
                        FileUpload::make('hero_image')->label('Imagen de fondo del Hero')->image()->directory('hero')->disk('images'),
                        TextInput::make('hero_title')->label('Título del Hero'),
                        Textarea::make('hero_subtitle')->label('Subtítulo del Hero')->rows(3),
                        TextInput::make('hero_cta_text')->label('Botón principal (texto)'),
                        TextInput::make('hero_cta2_text')->label('Botón secundario (texto)'),
                    ]),

                    Tabs\Tab::make('Quiénes Somos')->schema([
                        FileUpload::make('about_image')->label('Imagen Quiénes Somos')->image()->directory('about')->disk('images'),
                        Textarea::make('about_history')->label('Historia de la asociación')->rows(6),
                        Textarea::make('mission')->label('Misión')->rows(4),
                        Textarea::make('vision')->label('Visión')->rows(4),
                        TextInput::make('founded_year')->label('Año de fundación'),
                        TextInput::make('legal_year')->label('Año de constitución legal'),
                    ]),

                    Tabs\Tab::make('Estadísticas')->schema([
                        TextInput::make('stat_families')->label('Familias apoyadas'),
                        TextInput::make('stat_volunteers')->label('Voluntarios'),
                        TextInput::make('stat_programs')->label('Programas activos'),
                        TextInput::make('stat_years')->label('Años de servicio'),
                    ]),

                    Tabs\Tab::make('Contacto')->schema([
                        TextInput::make('contact_email')->label('Email de contacto')->email(),
                        TextInput::make('contact_phone')->label('Teléfono'),
                        TextInput::make('contact_whatsapp')->label('WhatsApp (con código de país, ej: 521XXXXXXXXXX)'),
                        Textarea::make('contact_address')->label('Dirección completa')->rows(2),
                        TextInput::make('contact_city')->label('Ciudad/Estado'),
                        TextInput::make('google_maps_url')->label('URL de Google Maps')->url(),
                    ]),

                    Tabs\Tab::make('Redes Sociales')->schema([
                        TextInput::make('social_facebook')->label('Facebook')->url()->prefix('https://'),
                        TextInput::make('social_instagram')->label('Instagram')->url()->prefix('https://'),
                        TextInput::make('social_twitter')->label('Twitter / X')->url()->prefix('https://'),
                        TextInput::make('social_youtube')->label('YouTube')->url()->prefix('https://'),
                        TextInput::make('social_tiktok')->label('TikTok')->url()->prefix('https://'),
                    ]),

                    Tabs\Tab::make('Donaciones')->schema([
                        TextInput::make('donation_title')->label('Título sección donaciones'),
                        Textarea::make('donation_text')->label('Texto donaciones')->rows(3),
                        TextInput::make('donation_bank')->label('Banco'),
                        TextInput::make('donation_clabe')->label('CLABE interbancaria'),
                        TextInput::make('donation_account')->label('Número de cuenta'),
                        TextInput::make('donation_paypal')->label('Link de PayPal')->url(),
                    ]),
                ]),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Guardar cambios')
                ->action('save')
                ->color('primary'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            if ($value !== null) {
                $setting = SiteSetting::where('key', $key)->first();
                SiteSetting::set(
                    key: $key,
                    value: $value,
                    type: $setting?->type ?? 'text',
                    group: $setting?->group ?? 'general',
                    label: $setting?->label ?? $key,
                );
            }
        }

        SiteSetting::clearCache();

        Notification::make()
            ->title('Configuración guardada correctamente')
            ->success()
            ->send();
    }
}
