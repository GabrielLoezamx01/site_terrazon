#!/bin/bash

# Borra el caché de Nginx
rm -rf /var/cache/nginx/*

# Inicia Nginx en primer plano
nginx -g 'daemon off;'
