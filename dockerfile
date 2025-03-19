# PHP'nin en son sürümünü kullanıyoruz (örneğin PHP 8.2)
FROM php:8.2-fpm

# Çalışma dizinini ayarlıyoruz
WORKDIR /var/www

# Sistemdeki gerekli paketleri yüklüyoruz
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*  # Gereksiz dosyaları temizliyoruz

# PHP uzantılarını kuruyoruz
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql mbstring zip exif pcntl bcmath opcache

# OPcache ayarlarını yapılandırıyoruz
RUN echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "opcache.memory_consumption=256" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "opcache.max_accelerated_files=20000" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "opcache.validate_timestamps=0" >> /usr/local/etc/php/conf.d/opcache.ini

# PHP bellek limitini 1024M olarak ayarla
RUN echo "memory_limit = 1024M" > /usr/local/etc/php/conf.d/memory-limit.ini

# Composer'ı kuruyoruz
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Proje dosyalarını kopyalıyoruz
COPY . .

# Dosya izinlerini ayarlıyoruz
RUN chmod -R 755 /var/www

# Composer ile bağımlılıkları yüklüyoruz
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Gereksiz dosyaları kaldırıyoruz
RUN composer dump-autoload --optimize

# Laravel'in storage ve cache dizinlerine izin veriyoruz
RUN chmod -R 777 storage bootstrap/cache

# 9000 portunu açıyoruz
EXPOSE 9000

# FPM'yi çalıştırıyoruz
CMD ["php-fpm"]
