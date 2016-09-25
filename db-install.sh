#!/bin/bash

sudo su postgres -c "psql -c 'DROP DATABASE IF EXISTS blue'"
sudo su postgres -c "psql -c 'CREATE DATABASE blue'"
#sudo su postgres -c "psql blue -c 'DROP USER IF EXISTS pblue'"
#sudo su postgres -c "psql blue -c 'CREATE USER pblue'"

for file in $(find ./phalcon-blue/database -name "*.sql" | sort) ; do
  echo "SQL file $file to database blue"
  sudo su postgres -c "psql blue < $file"
done