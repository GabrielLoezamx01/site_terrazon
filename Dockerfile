FROM jkaninda/nginx-php-fpm:8.3
# Copy laravel project files
COPY . /var/www/html
# COPY ./Docker/laravel-php.ini /usr/local/etc/php/conf.d/laravel-php.ini
COPY ./Docker/nginx.conf /etc/nginx/nginx.conf
COPY ./Docker/site-nginx.conf /etc/nginx/http.d/default.conf

COPY ./Docker/site-nginx.conf /var/www/html/conf/nginx/nginx-site.conf

# Storage Volume
VOLUME /var/www/html/storage

WORKDIR /var/www/html

# Custom cache invalidation / optional
#ARG CACHEBUST=1
# composer install / Optional
#RUN composer install
# Fix permissions
RUN chown -R www-data:www-data /var/www/html

USER www-data
 
