FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git curl unzip zip nodejs npm \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libzip-dev libonig-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install \
    gd \
    pdo \
    pdo_mysql \
    mbstring \
    zip \
    exif

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN mkdir -p storage/framework/{cache/data,sessions,views,testing} bootstrap/cache

RUN chmod -R 775 storage bootstrap/cache

RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction

RUN npm install
RUN npm run build

EXPOSE 8000

CMD sh -c "\
php artisan optimize:clear && \
php artisan migrate --force && \
php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"