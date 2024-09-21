#!/bin/bash

# Ejecutar comandos de artisan
php artisan storage:link --force
php artisan optimize
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Iniciar supervisord o NGINX, PHP-FPM, etc.
exec "$@"