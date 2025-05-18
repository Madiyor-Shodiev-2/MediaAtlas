FROM --platform=linux/amd64 php:8.3-fpm as base

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    mbstring \
    bcmath \
    gd \
    zip \
    && apt-get purge -y --auto-remove \
    && rm -rf /var/lib/apt/lists/*

COPY composer.json composer.lock /var/www/html/

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Определяем UID и GID
ARG UID=1000
ARG GID=1000

# Создаем группу и пользователя с указанными UID и GID
RUN groupadd -g $GID www && \
    useradd -u $UID -g $GID -m www

# Устанавливаем владельца директорий
RUN chown -R www:www /var/www/html/storage /var/www/html/bootstrap/cache

USER www
