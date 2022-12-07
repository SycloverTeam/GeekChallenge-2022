#！/bin/bash
service apache2 start
/etc/init.d/postgresql start
sudo -u postgres psql -d ctf -U postgres -f /tmp/ezsql.sql
echo 'SYC{1s_re@L_eaEASYsy_SQ&&L}' > /aflag
rm -rf /tmp/
tail -f /dev/null

