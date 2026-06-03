<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value', 'type', 'group', 'label'];

    /**
     * Obtener un valor de configuración del sitio por clave.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = Cache::remember("site_setting_{$key}", 3600, function () use ($key) {
            return static::where('key', $key)->first();
        });

        if (! $setting) {
            return $default;
        }

        return match ($setting->type) {
            'boolean' => (bool) $setting->value,
            'json'    => json_decode($setting->value, true),
            default   => $setting->value,
        };
    }

    /**
     * Establecer un valor de configuración del sitio.
     */
    public static function set(string $key, mixed $value, string $type = 'text', string $group = 'general', string $label = ''): self
    {
        if (is_array($value)) {
            $value = json_encode($value);
            $type  = 'json';
        }

        $setting = static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => $type, 'group' => $group, 'label' => $label]
        );

        Cache::forget("site_setting_{$key}");

        return $setting;
    }

    /**
     * Obtener todos los settings de un grupo.
     */
    public static function getGroup(string $group): array
    {
        return Cache::remember("site_settings_group_{$group}", 3600, function () use ($group) {
            return static::where('group', $group)->pluck('value', 'key')->toArray();
        });
    }

    /**
     * Limpiar caché de settings.
     */
    public static function clearCache(): void
    {
        Cache::flush();
    }
}
