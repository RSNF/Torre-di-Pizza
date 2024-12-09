FROM php:8.1-alpine

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apk add libpq-dev \
  && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install pgsql pdo pdo_pgsql

EXPOSE 80
