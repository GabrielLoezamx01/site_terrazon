FROM webdevops/php-nginx:8.2-alpine
ENV NODE_VERSION=18.x
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -fsSL https://deb.nodesource.com/setup_${NODE_VERSION} | bash -
# Install Node    
RUN apt-get install -y nodejs     

COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY composer.json composer.lock /app/
WORKDIR /app
RUN composer install --no-interaction --no-scripts --no-suggest
COPY . /app