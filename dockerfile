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
    libpq-dev && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*  # Gereksiz dosyaları temizliyoruz

# PHP uzantılarını kuruyoruz
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Composer'ı kuruyoruz
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Proje dosyalarını kopyalıyoruz
COPY . .

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
