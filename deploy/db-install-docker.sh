#!/bin/bash

# install PostgreSQL 9.5 in ubuntu 14.04
#  sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt/ trusty-pgdg main"' >> /etc/apt/sources.list.d/pgdg.list
# wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | apt-key add -

su postgres -c "psql -c 'DROP DATABASE IF EXISTS blue'"
su postgres -c "psql -c 'CREATE DATABASE blue'"
su postgres -c "psql blue -c 'DROP USER IF EXISTS pblue'"
su postgres -c "psql blue -c 'CREATE USER pblue'"


for file in $(find /var/www/database/schema -name "*.sql" | sort) ; do
  echo "schema file $file to database blue"
  su postgres -c "psql blue < $file"
done

for file in $(find /var/www/database/plsql -name "*.sql" | sort) ; do
  echo "plsql file $file to database blue"
  su postgres -c "psql blue < $file"
done

su postgres -c "psql blue -c 'GRANT bluereadrole, bluewriterole TO pblue'"
