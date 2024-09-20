FROM webdevops/php-nginx:8.2
# ENVIROMENTS
ENV NODE_VERSION=18.19.1
ENV NVM_DIR=/root/.nvm
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"

# Install NVM and Node.js
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash \
    && . "$NVM_DIR/nvm.sh" \
    && nvm install ${NODE_VERSION} \
    && nvm alias default ${NODE_VERSION} \
    && nvm use default

RUN mkdir -p /var/cache/nginx_cache && chown -R www-data:www-data /var/cache/nginx_cache

COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/nginx.conf /etc/nginx/nginx.conf
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY ./dockerizer/laravel.sh /app/laravel.sh 

COPY ./package*.json /app/
COPY ./composer.json ./composer.lock /app/

WORKDIR /app  
RUN composer install --no-interaction --no-scripts
COPY . /app

RUN chmod -R 755 /app/bootstrap/
RUN chown -R application:application /app/bootstrap/
RUN chmod -R 755 /app/storage/
RUN chmod +x /app/laravel.sh 
RUN /app/laravel.sh