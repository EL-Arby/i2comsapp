<?php

/**
 * Patches Illuminate\Support\Number so Filament tables work when ext-intl is missing
 * but symfony/polyfill-intl-icu provides the NumberFormatter class.
 *
 * Re-run automatically after `composer install` / `composer update` via post-autoload-dump.
 */

declare(strict_types=1);

$path = dirname(__DIR__).'/vendor/laravel/framework/src/Illuminate/Support/Number.php';

if (! is_readable($path)) {
    return;
}

$contents = file_get_contents($path);
if ($contents === false) {
    return;
}

if (str_contains($contents, 'class_exists(\NumberFormatter::class')) {
    return;
}

$search = <<<'PHP'
    protected static function ensureIntlExtensionIsInstalled()
    {
        if (! extension_loaded('intl')) {
            $method = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];

            throw new RuntimeException('The "intl" PHP extension is required to use the ['.$method.'] method.');
        }
    }
PHP;

$replace = <<<'PHP'
    protected static function ensureIntlExtensionIsInstalled()
    {
        if (extension_loaded('intl')) {
            return;
        }

        if (class_exists(\NumberFormatter::class)) {
            return;
        }

        $method = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];

        throw new RuntimeException('The "intl" PHP extension is required to use the ['.$method.'] method.');
    }
PHP;

if (! str_contains($contents, $search)) {
    fwrite(STDERR, "apply-laravel-number-intl-fallback: expected block not found in Number.php, skipping.\n");

    return;
}

file_put_contents($path, str_replace($search, $replace, $contents));
