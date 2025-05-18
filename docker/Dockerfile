FROM --platform=linux/amd64 php:8.3-fpm

# Установка рабочей директории
WORKDIR /var/www/html

# Установка системных зависимостей и PHP-расширений
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

# Копирование файлов composer и установка зависимостей
COPY composer.json composer.lock ./
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Копирование остальных файлов проекта
COPY . .

# Определение UID и GID
ARG UID=1000
ARG GID=1000

# Создание группы и пользователя с указанными UID и GID
RUN groupadd -g $GID www && \
    useradd -u $UID -g $GID -m www

# Установка владельца для директорий
RUN chown -R www:www /var/www/html/storage /var/www/html/bootstrap/cache

# Переключение на нового пользователя
USER www
