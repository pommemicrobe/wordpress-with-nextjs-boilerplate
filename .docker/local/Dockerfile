FROM php:8.2-fpm-alpine

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Install system dependencies
RUN apk update && apk add --no-cache \
        nginx \
        zip \
        unzip \
        curl \
        curl-dev \
        libxml2 \
        libxml2-dev \
        libzip \
        libzip-dev \
        libpng \
        libpng-dev \
        oniguruma \
        oniguruma-dev \
        icu \
        icu-dev

# Install PHP extensions
RUN docker-php-ext-install \
        mysqli \
        pdo \
        pdo_mysql \
        curl \
        dom \
        mbstring \
        xml \
        zip \
        calendar \
        exif \
        gd \
        calendar \
        bz2 \
        fileinfo \
        gd \
        opcache \
        bcmath \
        intl

# Enable PHP extensions
RUN docker-php-ext-enable \
        mysqli \
        pdo \
        pdo_mysql \
        curl \
        dom \
        mbstring \
        xml \
        zip \
        calendar \
        exif \
        gd \
        calendar \
        bz2 \
        fileinfo \
        gd \
        opcache \
        bcmath \
        intl

# Install composer
# RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
# RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
# RUN php composer-setup.php
# RUN php -r "unlink('composer-setup.php');"
# RUN mv composer.phar /composer
# RUN alias composer="php composer.phar"

# Copy nginx server configuration
COPY ./config/default.conf /etc/nginx/http.d/default.conf

# Copy docker entrypoint
COPY ./config/docker-entrypoint.sh /docker-entrypoint.sh

# Give execution permissions to docker entrypoint
RUN chmod +x /docker-entrypoint.sh

# Expose port 80
EXPOSE 80

# Set working directory
WORKDIR /app

# Execute docker entrypoint
ENTRYPOINT ["/docker-entrypoint.sh"]
