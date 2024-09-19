#!/bin/bash
set -e

# Limpiar la caché de Nginx
rm -rf /var/cache/nginx/*

# Ejecutar el script de configuración de Laravel
/app/laravel-setup.sh

# Ejecutar el comando pasado al contenedor (en este caso, será supervisord)
exec "$@"