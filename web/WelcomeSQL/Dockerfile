FROM ctftraining/base_image_nginx_mysql_php_56


COPY html /var/www/html

RUN sh -c 'mysqld_safe &' \
    && sleep 2s \
    && mysql -e "source /var/www/html/db.sql;" -uroot -proot \
    && rm -f /var/www/html/db.sql