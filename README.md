# Silo \ Policy \ Cookies

Moduł orkiestracji zgód cookies zainstalowany jako zewnętrzna paczka Git.

# Silo \ Policy \ Cookies

Moduł orkiestracji zgód cookies zainstalowany jako zewnętrzna paczka Git, zaprojektowany zgodnie z zasadami SOLID, DRY oraz pełną separacją logiki od warstwy publicznej.

## Struktura Paczki

Paczka wykorzystuje strukturę silosową, aby odizolować kod źródłowy od punktów dostępu publicznego:

```text
/silo-policy-cookies
├── bin/
│   └── setup-links.sh       # Skrypt automatyzujący tworzenie symlinków (bramek) w folderze publicznym.
├── src/                     # Główny kod źródłowy (Strefa Chroniona)
│   └── Policy/
│       └── Cookies/
│           ├── CookieOrchestrator.php # Serce modułu - zarządza konfiguracją i wstrzykiwaniem sekcji.
│           ├── CookieService.php      # Serwis backendowy - przetwarza dane i utrwala zgody.
│           ├── Gateway/
│           │   └── handler.php        # Fizyczny plik obsługujący żądania AJAX (docelowy cel symlinka).
│           └── Views/
│               └── template.php       # Hermetyczny szablon HTML/JS wstrzykiwany na front-end.
├── composer.json            # Definicja paczki i autoladowania PSR-4.
└── README.md                # Dokumentacja techniczna.
```

## Instalacja
1. Pobierz paczkę do katalogu vendor:
   `git clone [url-repo] vendor/silo/policy-cookies`
2. Skonfiguruj bramkę publiczną:
   `chmod +x vendor/silo/policy-cookies/bin/setup-links.sh`
   `./vendor/silo/policy-cookies/bin/setup-links.sh`

## Użycie (Orkiestracja)
W głównym pliku szablonu Twojego sklepu (np. footer.php lub index.php), po zainicjowaniu sesji, wywołaj orchestrator:
```php
use Silo\Policy\Cookies\CookieOrchestrator;

$cookies = new CookieOrchestrator($_SESSION['lang'], $_SESSION['lang_id']);
$cookies->render();

```

### Zasada Działania
1. Orchestrator (PHP) sprawdza, czy użytkownik podjął już decyzję. Jeśli nie, generuje konfigurację JSON na podstawie danych sesyjnych.
2. Template (JS) ładuje bibliotekę cookieconsent z CDN i wyświetla interfejs użytkownika (Box).
3. Gateway (Bridge) po kliknięciu przez użytkownika "Akceptuj", wysyła żądanie do silo-gateway.php.
4. Service (PHP) odbiera dane, ustawia ciasteczka techniczne (HttpOnly, Secure) i potwierdza zapis zgody po stronie serwera.

### Bezpieczeństwo

1. Izolacja: Cała logika biznesowa znajduje się w /src/, która jest niedostępna z poziomu przeglądarki.
2. Minimalizm: Strefa publiczna posiada jedynie symlink do handlera, co minimalizuje powierzchnię ataku.
3. Niezależność: Paczka jest autonomicznym "silosem" – jej aktualizacja w vendor nie wymaga zmian w głównym kodzie sklepu.

