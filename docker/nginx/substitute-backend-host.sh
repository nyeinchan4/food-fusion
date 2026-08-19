#!/bin/sh
# /docker-entrypoint.d/25-substitute-backend-host.sh
# Substitutes ${BACKEND_HOST} in the Nginx config before Nginx starts.
# Only replaces BACKEND_HOST — Nginx variables like $uri stay untouched.
set -e

TEMPLATE=/etc/nginx/conf.d/default.conf

if [ -z "$BACKEND_HOST" ]; then
  echo "WARNING: BACKEND_HOST is not set, defaulting to 'localhost'"
  export BACKEND_HOST=localhost
fi

echo "Nginx: setting backend FastCGI host to '$BACKEND_HOST'"
# Substitute only ${BACKEND_HOST} — leave all other $ variables intact
sed -i "s|\${BACKEND_HOST}|${BACKEND_HOST}|g" "$TEMPLATE"
