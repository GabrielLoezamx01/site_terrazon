#!/bin/bash
set -e
 
mkdir -p /var/run && supervisorctl reload

rm -rf /var/cache/nginx/* 

# Ejecutar el comando pasado al contenedor (en este caso, será supervisord)
exec "$@"