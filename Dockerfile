FROM richarvey/nginx-php-fpm:latest

#COPY . .

# Kopiera alla filer till containerns arbetskatalog
COPY . /var/www/html/

# Kopiera skriptet till en lämplig plats och gör det körbart
COPY scripts/00-laravel-deploy.sh /usr/local/bin/laravel-setup
RUN chmod +x /usr/local/bin/laravel-setup

# Kör skriptet för att installera beroenden och konfigurera Laravel
RUN /usr/local/bin/laravel-setup

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]