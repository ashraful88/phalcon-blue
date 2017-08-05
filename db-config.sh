#!/bin/bash

sudo su postgres -c "cp ./database/config/postgresql.conf /etc/postgresql/9.5/main/postgresql.conf"
sudo su postgres -c "cp ./database/config/pg_hba.conf /etc/postgresql/9.5/main/pg_hba.conf"
sudo service postgresql restart
