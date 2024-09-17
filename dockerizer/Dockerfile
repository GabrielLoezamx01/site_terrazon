FROM webdevops/php-nginx:8.2
# ENVIROMENTS
ENV NODE_VERSION=18.19.1 

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

WORKDIR /app

RUN composer install --no-interaction --no-scripts --no-suggest
RUN npm i \
    && npm run build

RUN php artisan storage:link --force \
    && php artisan optimize \
    && php artisan cache:clear \
    && php artisan config:clear \
    && php artisan view:clear

COPY . /app

# Configure Nginx
COPY nginx.conf /etc/nginx/sites-available/default

EXPOSE 80

CMD service nginx start && php-fpm