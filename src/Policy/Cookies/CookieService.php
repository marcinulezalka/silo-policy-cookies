<?php

namespace Silo\Policy\Cookies;

/**
 * Klasa CookieService
 *
 * Obsługuje logikę biznesową zapisu zgód po stronie serwera.
 * Wywoływana asynchronicznie przez bramkę (Gateway).
 *
 * @package Silo\Policy\Cookies
 */
class CookieService
{
    /**
     * Przetwarza dane zgody i ustawia techniczne ciasteczko potwierdzające.
     *
     * @param array|null $data Dane JSON z front-endu
     * @return array Status operacji dla klienta
     */
    public function handleConsent(?array $data): array
    {
        if (!$data) {
            return ['status' => 'error', 'message' => 'Empty payload'];
        }

        // Ustawienie ciasteczka blokującego ponowne wyświetlanie (1 rok)
        setcookie(
            'cookie_agreement_confirmed',
            '1',
            time() + 31536000,
            '/',
            '',
            true, // Secure
            true  // HttpOnly
        );

        return [
            'status' => 'success',
            'timestamp' => time(),
            'received' => count($data['cookie']['categories'] ?? [])
        ];
    }
}
