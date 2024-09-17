#!/bin/sh

# Esperar a que la base de datos esté disponible (opcional, si es necesario)
# while ! nc -z db_host db_port; do
#   sleep 1
# done

# Ejecutar comandos de Laravel
php /app/artisan storage:link --force
php /app/artisan optimize
php /app/artisan cache:clear
php /app/artisan config:clear
php /app/artisan view:clear
