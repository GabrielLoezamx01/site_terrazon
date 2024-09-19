#!/bin/bash
set -e

# Limpiar la caché de Nginx
rm -rf /var/cache/nginx/*

# Ejecutar el comando pasado al contenedor (en este caso, será supervisord)
exec "$@"