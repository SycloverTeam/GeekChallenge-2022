FROM php:7.2-apache

COPY ./html/ /var/www/html/
COPY ./flag /
COPY ./run.sh /
COPY ./seed /

# 创建文件夹
RUN mkdir /qu35t10ns /U5ers1nf0_95279527 && chown www-data:www-data /U5ers1nf0_95279527 /qu35t10ns && chmod 700 /U5ers1nf0_95279527 /qu35t10ns

# 添加权限
RUN chmod 755 -R /var/www/html/ && chown -R root:www-data /var/www/html && chmod +x /run.sh && chmod 400 /flag && chmod 755 /seed

CMD /run.sh