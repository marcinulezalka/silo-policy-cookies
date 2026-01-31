<?php

namespace Silo\Policy\Cookies;

class CookieOrchestrator
{
    private array $config;
    private array $translations;

    public function __construct(array $config, string $langCode)
    {
        $this->config = $config;
        $this->translations = $this->loadTranslations($langCode);
    }

    private function loadTranslations(string $langCode): array
    {
        $file = "{$this->config['paths']['lang']}/{$langCode}/cookies.php";
        return file_exists($file) ? require $file : [];
    }

    public function render(): void
    {
        if (isset($_COOKIE['cookie_agreement_confirmed']) && $_COOKIE['cookie_agreement_confirmed'] === '1') {
            return;
        }

        $config = [
            'guiOptions' => $this->config['gui_options'],
            'categories' => $this->config['categories'],
            'language'   => [
                'default' => 'pl',
                'translations' => ['pl' => $this->translations]
            ]
        ];
        
        $apiEndpoint = $this->config['gateway_url'];
        $authToken = $this->config['auth_token'];

        require "{$this->config['paths']['views']}/template.php";
    }
}
