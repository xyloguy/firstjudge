FROM ubuntu:16.04

RUN apt-get update -y \
    && apt-get install -y \
        locales \
    && locale-gen en_US.UTF-8
ENV LANG=en_US.UTF-8

RUN apt-get install -y software-properties-common \
    && add-apt-repository ppa:ondrej/php -y \
    && apt-get update -y
RUN apt-get install -y \
	php7.1-curl \
    php7.1-exif \
    php7.1-fpm \
    php7.1-gd \
    php7.1-mbstring \
    php7.1-mcrypt \
    php7.1-mysql \
    php7.1-opcache \
    php7.1-xml \
	php7.1 \
	nginx

RUN cd /etc/php/7.1/fpm \
    && sed -i 's/^\;clear_env/clear_env/g' pool.d/www.conf \
    && sed -i 's/^;catch_workers_output/catch_workers_output/g' pool.d/www.conf \
    && mkdir /run/php
RUN rm /etc/nginx/sites-enabled/default

RUN mkdir /srv/code && chmod -R +r /srv/code
WORKDIR /srv/code

EXPOSE 80
CMD service nginx start && php-fpm7.1 -F
