FROM php:5.6-fpm-alpine

MAINTAINER Chinfo@geekchallenge2022


COPY _files /tmp/

ENV FLAG=SYC{just_@_no0b_tw1ce_sql}

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories \
    && apk add --update --no-cache tar nginx mysql mysql-client \
    && mkdir /run/nginx \
    # mysql ext
    && docker-php-source extract \
    && docker-php-ext-install mysql mysqli pdo_mysql \
    && docker-php-source delete \
    # init mysql
    # && sed -i 's/skip-network/#skip-network/' /etc/my.cnf.d/mariadb-server.cnf \
    && mysql_install_db --user=mysql --datadir=/var/lib/mysql \
    && sh -c 'mysqld_safe &' \
    && sleep 5s \
    && mysqladmin -uroot password 'root' \
    # Fix: Update all root password
    && mysql -uroot -proot -e "UPDATE mysql.user SET Password=PASSWORD('root') WHERE user='root';" \
    && mysql -uroot -proot -e "create user ping@'%' identified by 'ping';" \
    # configure file
    && cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini \
    && sed -i -e 's/display_errors.*/display_errors = Off/' /usr/local/etc/php/php.ini \
    && mv /tmp/flag.sh /flag.sh \
    && mv /tmp/docker-php-entrypoint /usr/local/bin/docker-php-entrypoint \
    && chmod +x /usr/local/bin/docker-php-entrypoint \
    && mv /tmp/nginx.conf /etc/nginx/nginx.conf \
    && echo '<?php phpinfo();' > /var/www/html/index.php \
    && chown -R www-data:www-data /var/www/html \
    # clear
    && rm -rf /tmp/*

WORKDIR /var/www/html

EXPOSE 80

VOLUME ["/var/log/nginx"]

ENTRYPOINT ["/bin/sh", "/usr/local/bin/docker-php-entrypoint"]



COPY src /var/www/html

RUN sh -c 'mysqld_safe &' \
    && sleep 5s \
    && mysql -e "source /var/www/html/db.sql;" -uroot -proot \
    && rm -f /var/www/html/db.sql