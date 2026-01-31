# Silo \ Policy \ Cookies

Moduł orkiestracji polityki cookies.

## Instalacja
1. Dodaj do projektu przez Composer lub Git.
2. Uruchom: `./vendor/silo/policy-cookies/bin/setup-links.sh`
3. W PHP:
   `\Silo\Policy\Cookies\SiloCookieServiceProvider::register('pl')->render();`

## Bezpieczeństwo
Komunikacja zabezpieczona nagłówkiem Bearer Token zdefiniowanym w `config/silo_cookies.php`.
