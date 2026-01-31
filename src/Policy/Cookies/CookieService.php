<?php

namespace Silo\Policy\Cookies;

class CookieService
{
    public function handleConsent(?array $data, string $validToken): array
    {
        $headers = getallheaders();
        $authHeader = $headers['Authorization'] ?? $headers['authorization'] ?? '';

        if ($authHeader !== "Bearer $validToken") {
            http_response_code(401);
            return ['status' => 'error', 'message' => 'Unauthorized'];
        }

        // Ustawienie ciasteczka potwierdzającego na 1 rok
        setcookie('cookie_agreement_confirmed', '1', time() + 31536000, '/', '', true, true);
        
        return ['status' => 'success'];
    }
}
