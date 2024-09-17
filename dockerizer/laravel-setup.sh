#!/bin/sh

# Esperar a que la base de datos esté disponible (opcional, si es necesario)
# while ! nc -z db_host db_port; do
#   sleep 1
# done

# Ejecutar comandos de Laravel
php artisan storage:link --force
php artisan optimize
php artisan cache:clear
php artisan config:clear
php artisan view:clear
