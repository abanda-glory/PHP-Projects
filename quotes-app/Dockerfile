FROM php:8.4-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Clear config cache so Render env vars are loaded at runtime
RUN php artisan config:clear

# Fix Laravel writable directories
RUN chmod -R 777 storage bootstrap/cache

# Expose Render port
EXPOSE 10000

# Start Laravel from public directory
CMD php -S 0.0.0.0:10000 -t public