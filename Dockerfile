FROM php:7.2-fpm-alpine

COPY . /app

WORKDIR /var/www/html
RUN chmod 777 /app/var
RUN chmod 777 /app/var/cache

CMD ["php", "bin/console", "app:generate-sequence", "1", "2", "3", "4"]