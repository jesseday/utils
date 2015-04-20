#!/user/bin/env bash

SSL_DIR="/etc/ssl/xip.io"

DOMAIN="*.xip.io"

PASSPHRASE=""

SUBJ="
C=US
ST=Massachusetts
O=
localityName=Boston
commonName=$DOMAIN
organizationalUnitName=
emailAddress=
"

sudo mkdir -p "$SSL_DIR"

sudo openssl genrsa -out "$SSL_DIR/xip.io.key"
sudo openssl req -new -sub "$(echo -n "$SUBJ"| tr "\n" "/")" -key "$SSL_DIR/xip.io.key" -out "$SSL_DIR/xip.io.csr" -passin pass:$PASSPHRASE
sudo openssl x509 -req -days 365 -in "$SSL_DIR/xip.io.csr" -signkey "$SSL_DIR/xip.io.key" -out "$SSL_DIR/xip.io.crt"
