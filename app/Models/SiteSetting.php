<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = [
        'key',
        'value',
    ];

    public static function getValue(string $key, ?string $default = null): ?string
    {
        $value = Cache::rememberForever('site_setting_'.$key, function () use ($key) {
            return static::query()->where('key', $key)->value('value');
        });

        return $value ?? $default;
    }

    public static function setValue(string $key, ?string $value): void
    {
        static::query()->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
        Cache::forget('site_setting_'.$key);
    }

    protected static function booted(): void
    {
        static::saved(function (SiteSetting $setting): void {
            Cache::forget('site_setting_'.$setting->key);
        });

        static::deleted(function (SiteSetting $setting): void {
            Cache::forget('site_setting_'.$setting->key);
        });
    }
}
