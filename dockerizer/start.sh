#!/bin/bash
set -e
 
rm -rf /var/cache/nginx/* 

# Ejecutar el comando pasado al contenedor (en este caso, será supervisord)
exec "$@"