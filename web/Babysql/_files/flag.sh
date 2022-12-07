#!/bin/sh

# Create database and user
# mysql -e "create database ctfchinfo;" -uroot -proot
# mysql -e "grant select,insert,update,delete on ctfchinfo.* to ctfchinfo@'127.0.0.1' identified by 'ctfchinfo';" -uroot

# Set dynamic FLAG

touch /flag_$FLAG

# if [[ -f /var/www/html/db.sql ]]; then
#     sed -i "s#FLAG#$FLAG#" /var/www/html/db.sql || true
# fi

# mysql -e "USE $FLAG_SCHEMA;ALTER TABLE FLAG_TABLE CHANGE FLAG_COLUMN $FLAG_COLUMN CHAR(128) NOT NULL DEFAULT 'not_flag';ALTER TABLE FLAG_TABLE RENAME $FLAG_TABLE;INSERT $FLAG_TABLE VALUES('$FLAG');" -uroot -proot
# mysql -e "USE $FLAG_SCHEMA;UPDATE $FLAG_TABLE SET $FLAG_COLUMN='$FLAG'" -uroot -proot


# Reset mysql root's passwors as random string
mysql -uroot -proot -e "UPDATE mysql.user SET Password=PASSWORD(substring(MD5(RAND()),1,20)) WHERE user='root';"

export FLAG=not_flag
FLAG=not_flag

rm -f /flag.sh