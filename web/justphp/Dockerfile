FROM php:5.6-fpm-alpine

LABEL Organization="CTFTraining" Author="Virink <virink@outlook.com>"

MAINTAINER Virink@CTFTraining <virink@outlook.com>

COPY _files /tmp/
COPY src /var/www/html

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.ustc.edu.cn/g' /etc/apk/repositories \
    && apk add --update --no-cache nginx \
    && mkdir /run/nginx \
    # configure file
    && mv /tmp/docker-php-entrypoint /usr/local/bin/docker-php-entrypoint \
    && chmod +x /usr/local/bin/docker-php-entrypoint \
    && mv /tmp/nginx.conf /etc/nginx/nginx.conf \
    && chown -R www-data:www-data /var/www/html \
    # clear
    && rm -rf /tmp/*
    # && rm -rf /etc/apk

WORKDIR /var/www/html

EXPOSE 80

VOLUME ["/var/log/nginx"]

CMD ["/bin/bash", "-c", "docker-php-entrypoint"]