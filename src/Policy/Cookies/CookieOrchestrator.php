<?php

namespace Silo\Policy\Cookies;

/**
 * Class CookieOrchestrator
 * * Orkiestrator odpowiedzialny za wstrzykiwanie sekcji Cookies do front-endu.
 * Zarządza stanem wyświetlania komponentu i komunikacją z bramką (gateway).
 */
class CookieOrchestrator
{
    private array $lang;
    private int $langId;
    private string $gatewayUrl;

    /**
     * @param array $sessionLang Dane językowe $_SESSION['lang']
     * @param int $langId Identyfikator języka $_SESSION['lang_id']
     * @param string $gatewayUrl Adres URL publicznej bramki (np. /gate/cookies)
     */
    public function __construct(array $sessionLang, int $langId, string $gatewayUrl = '/silo-gateway.php?section=cookies')
    {
        $this->lang = $sessionLang;
        $this->langId = $langId;
        $this->gatewayUrl = $gatewayUrl;
    }

    /**
     * Główna metoda renderująca sekcję okna na froncie.
     * Wykorzystuje mechanizm Prior Consent (blokada do czasu zgody).
     */
    public function render(): void
    {
        if (isset($_COOKIE['cookie_agreement_confirmed']) && $_COOKIE['cookie_agreement_confirmed'] === '1') {
            return;
        }

        $config = $this->prepareConfig();
        $apiEndpoint = $this->gatewayUrl;

        require __DIR__ . '/Views/template.php';
    }

    private function prepareConfig(): array { /* Mapowanie z Twojego cookies.php */ }
}
