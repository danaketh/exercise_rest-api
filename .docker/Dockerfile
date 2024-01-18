## Development Dockerfile
#####################
FROM php:8.2.8-fpm-alpine

WORKDIR /var/www/html

## Dependencies
#####################
RUN apk --no-cache update \
    && apk --no-cache upgrade \
    && apk add --no-cache zlib-dev \
    libpng-dev \
    imap-dev \
    icu-dev \
    postgresql-dev \
    libxslt-dev \
    libzip-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    krb5-dev \
    wget \
    openssl \
    bash \
    linux-headers

## Extensions
#####################
RUN docker-php-ext-install bcmath gd imap intl pdo_pgsql opcache sockets xsl zip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl
RUN docker-php-ext-enable bcmath gd imap intl pdo_pgsql opcache sockets xsl zip

## Composer
#####################
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"


## Symfony
#####################
RUN echo "alias console='php /var/www/app/bin/console'" >> /root/.bashrc && \
    wget https://get.symfony.com/cli/installer -O - | bash && \
    mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

## Composer packages
#####################
RUN composer install --no-interaction --no-progress --no-suggest
