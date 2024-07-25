FROM php:8.2-apache-bullseye

COPY . /var/www/html

RUN apt-get update && apt-get install -y cowsay

RUN mv /usr/games/cowsay /usr/bin/cowsay

RUN mv ./flag.txt /flag

EXPOSE 80
