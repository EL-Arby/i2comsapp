<?php

namespace App\Support;

final class HeroBackground
{
    /** @var array<string, string> path relative to /public */
    public const PRESETS = [
        'hero_1' => 'images/hero-1.jpg',
        'hero_2' => 'images/hero-2.jpg',
        'maurit_2024' => 'images/Maurit AI2024 Header.jpg',
    ];

    /** @var array<string, string> */
    public const LABELS = [
        'hero_1' => 'Hero 1 (hero-1.jpg)',
        'hero_2' => 'Hero 2 (hero-2.jpg)',
        'maurit_2024' => 'Current header (Maurit AI2024 Header.jpg)',
    ];

    /**
     * @return array<string, string>
     */
    public static function adminOptions(): array
    {
        return self::LABELS;
    }

    public static function url(string $key): string
    {
        $path = self::PRESETS[$key] ?? self::PRESETS['maurit_2024'];

        return asset($path);
    }

    /**
     * @return list<string>
     */
    public static function orderedKeys(): array
    {
        return ['hero_1', 'hero_2', 'maurit_2024'];
    }

    /**
     * @param  array<string, string>  $settings
     * @return array{heroMode: string, heroSingleKey: string, heroSingleUrl: string, heroCarouselUrls: list<string>}
     */
    public static function viewData(array $settings): array
    {
        $mode = ($settings['hero_display_mode'] ?? 'single') === 'carousel' ? 'carousel' : 'single';
        $singleKey = $settings['hero_single_image'] ?? 'maurit_2024';
        if (! array_key_exists($singleKey, self::PRESETS)) {
            $singleKey = 'maurit_2024';
        }

        return [
            'heroMode' => $mode,
            'heroSingleKey' => $singleKey,
            'heroSingleUrl' => self::url($singleKey),
            'heroCarouselUrls' => array_map(fn (string $k): string => self::url($k), self::orderedKeys()),
        ];
    }
}
