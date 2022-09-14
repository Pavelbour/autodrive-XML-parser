FROM php:8.1-fpm

RUN apt-get update \
    && apt-get -y install \
    libicu-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    git \
    zlib1g-dev \
    --no-install-recommends \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) bcmath \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql \
    && docker-php-ext-install -j$(nproc) soap \
    && docker-php-ext-install -j$(nproc) opcache \
    && docker-php-ext-install -j$(nproc) zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && apt-get purge -y \
    icu-devtools \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/*

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
RUN composer clear-cache
