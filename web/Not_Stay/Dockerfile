# Origin image
FROM ctftraining/base_image_nginx_mysql_php_56

RUN rm -rf /var/www/html/*
COPY ./src /var/www/html

COPY ./flag /flagishere
RUN mkdir /var/www/html/upload/ && chmod -R 755 /var/www/html && chown -R root:www-data /var/www/html && chown -R www-data:www-data /var/www/html/upload && chmod 444 /flagishere
