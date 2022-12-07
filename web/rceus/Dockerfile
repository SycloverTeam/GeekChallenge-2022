FROM safoorsafdar/php-7.4.16-apache-buster
#FROM funxtionatics/php8-fpm-nginx-alpine


# 复制文件,设置web权限
COPY ./php.ini /usr/local/etc/php/php.ini
COPY ./html/ /var/www/html/
COPY ./nginx.conf /etc/nginx/nginx.conf

# flag相关
COPY ./flag.txt /secret
COPY readflag /readflag
COPY a.out /readsecret
RUN chmod 400 /secret && chmod 100 /readflag && chmod 555 -R /var/www/html/ && rm -rf /bin/pytho* && rm -rf /usr/*/pytho* && rm -rf /usr/lib/pytho* && rm -rf /etc/pytho* && chmod u+s /readsecret

RUN echo "root:syc1over" | chpasswd