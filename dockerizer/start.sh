#!/bin/bash
set -e
 
rm -rf /var/cache/nginx/* 
service nginx start
php-fpm

# Ejecutar el comando pasado al contenedor (en este caso, será supervisord)
exec "$@"