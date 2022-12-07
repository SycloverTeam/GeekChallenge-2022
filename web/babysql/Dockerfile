FROM an5er/lapp:latest


COPY ezsql.sql /tmp
COPY index.php /var/www/html
COPY start.sh  /tmp

RUN apt-get update && apt-get install -y sudo && rm /var/www/html/index.html

ENTRYPOINT ["/bin/bash","/tmp/start.sh"]
