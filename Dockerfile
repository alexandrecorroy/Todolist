FROM node:20-alpine as node-builder

WORKDIR /app

COPY package.json yarn.lock* ./
COPY webpack.config.js ./
COPY assets/ ./assets/

RUN yarn install --frozen-lockfile
RUN yarn encore production

FROM php:7.4-apache

RUN sed -i 's|http://deb.debian.org|http://archive.debian.org|g' /etc/apt/sources.list && \
    sed -i '/debian-security/d' /etc/apt/sources.list && \
    rm -rf /etc/apt/sources.list.d/* && \
    echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99no-check-valid-until

RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip zip curl \
    libicu-dev libpq-dev libzip-dev libonig-dev \
    libxml2-dev libpng-dev libjpeg-dev libfreetype6-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install intl pdo pdo_mysql zip gd \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

RUN curl -sS https://getcomposer.org/installer | php -- --version=2.7.6 && \
    mv composer.phar /usr/local/bin/composer

RUN sed -i 's|/var/www/html|/var/www/html/web|g' /etc/apache2/sites-available/000-default.conf \
 && sed -i 's|/var/www/html|/var/www/html/web|g' /etc/apache2/apache2.conf \
 && printf "\n<Directory /var/www/html/web>\n    Options Indexes FollowSymLinks\n    AllowOverride All\n    Require all granted\n</Directory>\n" >> /etc/apache2/apache2.conf

WORKDIR /var/www/html

COPY . .

COPY --from=node-builder /app/web/build ./web/build

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

COPY 99-custom.ini /usr/local/etc/php/conf.d/99-custom.ini

RUN chown -R www-data:www-data var && chmod -R 755 var

EXPOSE 80
