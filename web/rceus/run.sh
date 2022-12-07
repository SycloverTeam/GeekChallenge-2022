#!/bin/sh
sleep 1
nohup /usr/sbin/php-fpm8 &
nohup nginx & 
bash