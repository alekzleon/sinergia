<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        $basePath = trim((string) env('APP_BASE_PATH', ''), '/');

        if ($basePath !== '') {
            Livewire::setScriptRoute(function ($handle) use ($basePath) {
                return Route::get("/{$basePath}/livewire/livewire.min.js", $handle)
                    ->name('livewire.min.js');
            });

            Livewire::setUpdateRoute(function ($handle) use ($basePath) {
                return Route::post("/{$basePath}/livewire/update", $handle)
                    ->middleware('web')
                    ->name('custom.livewire.update');
            });
        }

        // Compartir configuración del sitio con todas las vistas
        View::composer('*', function ($view) {
            try {
                if (Schema::hasTable('site_settings')) {
                    $settings = Cache::remember('site_settings_all', 3600, function () {
                        return SiteSetting::all()->pluck('value', 'key')->toArray();
                    });

                    $view->with('siteSettings', $settings);
                }
            } catch (\Exception $e) {
                $view->with('siteSettings', []);
            }
        });
    }
}
