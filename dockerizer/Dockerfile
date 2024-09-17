FROM webdevops/php-nginx:8.2
# ENVIROMENTS
ENV NODE_VERSION=18.19.1
ENV NVM_DIR=/root/.nvm
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"

# Install dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    curl \
    git \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install NVM and Node.js
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash \
    && . "$NVM_DIR/nvm.sh" \
    && nvm install ${NODE_VERSION} \
    && nvm alias default ${NODE_VERSION} \
    && nvm use default

# Verify Node.js and npm installation
RUN node --version && npm --version
  

COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY composer.json composer.lock /app/
COPY package.json package-lock.json /app/
COPY webpack.mix.js /app/

WORKDIR /app

# RUN chmod -R 775 storage
RUN composer install --no-interaction --no-scripts --no-suggest
RUN npm i \
    && npm run production

RUN php artisan storage:link --force \
    && php artisan optimize \
    && php artisan cache:clear \
    && php artisan config:clear \
    && php artisan view:clear

COPY . /app

# Start Nginx and PHP-FPM, clear Nginx cache
EXPOSE 80
CMD rm -rf /var/cache/nginx/* && service nginx start && php-fpm