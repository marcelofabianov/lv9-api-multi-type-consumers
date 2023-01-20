FROM php:8.1.0-fpm

ENV TZ=America/Sao_Paulo

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN rm /etc/apt/preferences.d/no-debian-php && \
    apt-get update -yqq && \
    apt-get upgrade -y && \
    apt-get install -y --no-install-recommends \
    wget \
    curl \
    unzip \
    zip \
    git \
    openssl \
    libpq-dev \
    libaio1 \
    libaio-dev \
    zlib1g-dev \
    libonig-dev \
    libzip-dev \
    libicu-dev \
    libxml2-dev \
    gnupg2 \
    libodbc1 \
    nano \
    openssl

RUN docker-php-ext-configure intl && \
    docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql && \
      pecl install redis && \
      pecl install apcu && \
      pecl install xdebug && \
    docker-php-ext-install \
      pgsql \
      pdo_pgsql\
      intl \
      zip \
      mbstring \
      pcntl \
      bcmath \
      exif \
      sockets && \
    docker-php-ext-enable \
      redis \
      opcache \
      apcu \
      xdebug && \
    pecl clear-cache

# Composer
RUN curl -L -C - --progress-bar -o /usr/local/bin/composer https://getcomposer.org/composer.phar && \
    chmod 755 /usr/local/bin/composer && \
    useradd -m devs && \
    usermod -u 1000 devs

RUN composer self-update

COPY --chown=devs:www-data . /var/www

RUN chown -R www-data /var/www

USER devs

EXPOSE 9000

CMD ["php-fpm"]
