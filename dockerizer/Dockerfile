FROM webdevops/php-nginx:8.2
# ENVIROMENTS
ENV NODE_VERSION=18.19.1 

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install specific version of Node.js
RUN curl -fsSL https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash
ENV NVM_DIR=/root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"

# Verify Node.js and npm installation
RUN node --version && npm --version
  

COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY composer.json composer.lock /app/
WORKDIR /app
RUN composer install --no-interaction --no-scripts --no-suggest

RUN npm i \
    && npm run build

RUN php artisan storage:link --force && php artisan optimize && php artisan cache:clear && php artisan config:clear && php artisan view:clear

COPY . /app