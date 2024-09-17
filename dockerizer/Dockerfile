FROM webdevops/php-nginx:8.2-alpine
# ENVIROMENTS
ENV NODE_VERSION=18.19.1 

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and npm
RUN apk add --no-cache nodejs npm

# Verify Node.js and npm installation
RUN node --version && npm --version
  

COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY composer.json composer.lock /app/
WORKDIR /app
RUN composer install --no-interaction --no-scripts --no-suggest
COPY . /app