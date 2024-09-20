#!/bin/bash
set -e
 
./laravel-setup.sh

# Limpiar el caché de Nginx
echo "Limpiando el caché de Nginx..."
rm -rf /tmp/nginx_cache/*

# Asegurarse de que el directorio de caché existe y tiene los permisos correctos
mkdir -p /tmp/nginx_cache
chown -R www-data:www-data /tmp/nginx_cache

service nginx restart

# Ejecutar el comando pasado al contenedor (en este caso, será supervisord)
exec "$@"