#!/bin/bash
PROJECT_ROOT=$(pwd)
PACKAGE_PATH="$PROJECT_ROOT/vendor/silo/policy-cookies"

SOURCE="$PACKAGE_PATH/src/Policy/Cookies/Gateway/handler.php"
TARGET="$PROJECT_ROOT/public/silo-gateway.php"

if [ -f "$SOURCE" ]; then
    ln -sf "$SOURCE" "$TARGET"
    echo "Silo: Gateway symlinked to $TARGET"
else
    echo "Silo Error: Source handler not found at $SOURCE"
    exit 1
fi
