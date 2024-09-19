#!/bin/bash
set -e
 
rm -rf /var/cache/nginx/* 
php-fpm

# Ejecutar el comando pasado al contenedor (en este caso, será supervisord)
exec "$@"