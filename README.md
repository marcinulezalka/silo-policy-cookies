# Silo \ Policy \ Cookies

Moduł orkiestracji zgód cookies zainstalowany jako zewnętrzna paczka Git.

## Instalacja
1. Pobierz paczkę do katalogu vendor:
   `git clone [url-repo] vendor/silo/policy-cookies`
2. Skonfiguruj bramkę publiczną:
   `chmod +x vendor/silo/policy-cookies/bin/setup-links.sh`
   `./vendor/silo/policy-cookies/bin/setup-links.sh`

## Użycie (Orkiestracja)
W swoim projekcie wywołaj:
```php
use Silo\Policy\Cookies\CookieOrchestrator;

$cookies = new CookieOrchestrator($_SESSION['lang'], $_SESSION['lang_id']);
$cookies->render();
