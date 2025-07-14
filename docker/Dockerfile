FROM php:8.2-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    zip libcurl4-openssl-dev libssl-dev gnupg2 \
    && docker-php-ext-install pdo pdo_mysql zip\
    && pecl install redis \
    && docker-php-ext-enable redis

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /var/www/html

# Agregar repositorio como directorio seguro en Git
RUN git config --global --add safe.directory /var/www/html