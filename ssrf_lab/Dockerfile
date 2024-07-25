FROM php:8.2-apache-bullseye

COPY . /var/www/html

RUN mkdir -p upload/image && \
    chown -R www-data:www-data upload && \
    chmod -R 755 upload


EXPOSE 80
