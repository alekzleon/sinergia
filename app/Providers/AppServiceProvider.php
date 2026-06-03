<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Compartir configuración del sitio con todas las vistas
        View::composer('*', function ($view) {
            try {
                if (Schema::hasTable('site_settings')) {
                    $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
                    $view->with('siteSettings', $settings);
                }
            } catch (\Exception $e) {
                $view->with('siteSettings', []);
            }
        });
    }
}
