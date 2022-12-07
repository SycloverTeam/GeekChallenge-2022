# Origin image
FROM safoorsafdar/php-7.4.16-apache-buster

RUN rm -rf /var/www/html/*
COPY ./src /var/www/html
COPY ./flag /f1ag_is_here_y0u_k0nw
RUN mkdir /var/www/html/upload/ && chmod -R 755 /var/www/html && chown -R root:www-data /var/www/html &&chown -R www-data:www-data /var/www/html/upload  && chmod 400 /f1ag_is_here_y0u_k0nw && chmod u+s /bin/dd

