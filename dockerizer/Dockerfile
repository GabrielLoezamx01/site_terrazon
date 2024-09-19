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
    zip \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmemcached-dev \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    librdkafka-dev \
    libpq-dev \
    openssh-server \
    nano \
    cron

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

    # Create required directories
RUN mkdir -p /var/log/supervisor

COPY ./dockerizer/supervisord.conf /etc/supervisor/supervisord.conf
# COPY ./dockerizer/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY ./dockerizer/laravel-setup.sh /app/laravel-setup.sh
# Verify Node.js and npm installation
# RUN node --version && npm --version
# Copy the package.json and package-lock.json first
COPY package*.json /app/
COPY composer*.lock /app/

COPY ./dockerizer/start.sh /start.sh
RUN chmod +x /start.sh

# Set the working directory
WORKDIR /app
# Install Node.js dependencies
#RUN npm install
# Copy the rest of the application code
COPY . /app
# Install PHP dependencies
RUN composer install --no-interaction --no-scripts
# Build assets (assuming `npm run production` is needed)
#RUN npm run production
# Clear Laravel caches and optimize

# Asegúrate de hacer ejecutable el script de Laravel
WORKDIR /app
RUN chmod +x ./laravel-setup.sh
RUN ./laravel-setup.sh

# Start Nginx and PHP-FPM, clear Nginx cache
EXPOSE 80
# CMD rm -rf /var/cache/nginx/* && service nginx start && php-fpm
ENTRYPOINT ["/start.sh"]
# CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
# CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
