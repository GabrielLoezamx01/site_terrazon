#!/bin/bash
set -e
 
rm -rf /var/cache/nginx/*  && ./laravel-setup.sh

# Ejecutar el comando pasado al contenedor (en este caso, será supervisord)
exec "$@"