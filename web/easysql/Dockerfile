FROM ctftraining/base_image_nginx_mysql_php_56


COPY src /var/www/html

RUN sh -c 'mysqld_safe &' \
    && sleep 2s \
    && mysql -e "source /var/www/html/db.sql;" -uroot -proot \
    && rm -f /var/www/html/db.sql
RUN chown root:www-data  /var/www/html
RUN chmod 555 /var/www/html/index.php 
    && chmod 555 /var/www/html/login.php
    && chmod 555 /var/www/html/robots.txt
    && chmod 555 /var/www/html/style.css
    && chmod 555 /var/www/html/t1ps.php
    && chmod 555 /var/www/html/image/syclover.png
CMD echo $FLAG > /flag  && export FLAG=not_flag && FLAG=not_flag