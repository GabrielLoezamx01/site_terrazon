#!/bin/bash
set -e
 
./laravel-setup.sh

# Ejecutar el comando pasado al contenedor (en este caso, será supervisord)
exec "$@"