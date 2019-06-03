FROM php:7.2-apache
RUN usermod -u 1000 www-data
RUN usermod -G staff www-data