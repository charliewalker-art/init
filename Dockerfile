FROM php:8.2-fpm-alpine

# Extensions nécessaires pour MySQL
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www

# Copier le projet
COPY . /var/www

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Installer dépendances PHP
RUN composer install --no-interaction --prefer-dist --no-progress

EXPOSE 9000
CMD ["php-fpm"]