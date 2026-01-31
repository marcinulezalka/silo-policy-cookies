#!/bin/bash

# Silo Security Script - Automatyzacja bramek publicznych
# Uruchamiać z głównego katalogu projektu: ./vendor/silo/policy-cookies/bin/setup-links.sh

PROJECT_ROOT=$(pwd)
PUBLIC_DIR="$PROJECT_ROOT/public"
GATEWAY_FILE="$PUBLIC_DIR/silo-gateway.php"
SOURCE_HANDLER="$PROJECT_ROOT/vendor/silo/policy-cookies/src/Policy/Cookies/Gateway/handler.php"

echo "--- Silo: Konfiguracja połączeń publicznych ---"

if [ ! -d "$PUBLIC_DIR" ]; then
    echo "Błąd: Nie znaleziono katalogu /public w $PROJECT_ROOT"
    exit 1
fi

# Tworzenie bezpiecznego symlinka
ln -sf "$SOURCE_HANDLER" "$GATEWAY_FILE"

echo "Sukces: Utworzono bramkę: $GATEWAY_FILE"
echo "Bramka wskazuje na: $SOURCE_HANDLER"
