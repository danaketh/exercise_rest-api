## Development Dockerfile
#####################
FROM php:8.2.8-fpm-alpine
RUN addgroup -S app && adduser -S app -G app

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
RUN docker-php-ext-install bcmath gd imap intl pdo_pgsql opcache sockets xsl zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-enable bcmath gd imap intl pdo_pgsql opcache sockets xsl zip

## Composer & Symfony
#####################
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');" \
    && echo "alias console='php /var/www/html/bin/console'" >> /root/.bashrc \
    && wget https://get.symfony.com/cli/installer -O - | bash \
    && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

USER app
WORKDIR /var/www/html
