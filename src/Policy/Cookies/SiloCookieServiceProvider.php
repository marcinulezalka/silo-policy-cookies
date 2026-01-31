<?php

namespace Silo\Policy\Cookies;

class SiloCookieServiceProvider
{
    private static ?CookieOrchestrator $instance = null;

    public static function register(string $langCode, ?string $configPath = null): CookieOrchestrator
    {
        if (self::$instance === null) {
            $path = $configPath ?? __DIR__ . '/../../../config/silo_cookies.php';
            if (!file_exists($path)) {
                throw new \Exception("Silo config not found at: $path");
            }
            self::$instance = new CookieOrchestrator(require $path, $langCode);
        }
        return self::$instance;
    }
}
