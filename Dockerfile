FROM php:7.4-fpm
MAINTAINER Truyen <truyenhv@outlook.com>

WORKDIR /app

RUN docker-php-ext-install mysqli

COPY . /app/
RUN chmod 777 -R /app/*
