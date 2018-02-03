#!/bin/bash

sudo apt-get update
sudo apt-get -y install nginx

sudo sh -c 'echo "deb http://apt.postgresql.org/pub/repos/apt/ xenial-pgdg main"' >> /etc/apt/sources.list.d/pgdg.list
wget --quiet -O - https://www.postgresql.org/media/keys/ACCC4CF8.asc | sudo apt-key add -
#sudo apt-add-repository -y ppa:phalcon/stable
curl -s "https://packagecloud.io/install/repositories/phalcon/stable/script.deb.sh" | sudo bash
sudo apt-get install -y python-software-properties
sudo add-apt-repository -y ppa:ondrej/php

sudo apt-get update -y
sudo apt-get install -y postgresql-9.5
sudo apt-get install -y php7.0-phalcon php7.0-pgsql php7.0-curl php7.0-mbstring php7.0-curl php7.0-cli php7.0-fpm php7.0-mcrypt

#apt-cache pkgnames | grep php7.1

sudo curl -s http://getcomposer.org/installer > /tmp/composer_installer.php
sudo php /tmp/composer_installer.php --install-dir=/tmp
sudo mv /tmp/composer.phar /usr/bin/composer


sudo mkdir /var/log/nginx/phalcon-blue
#sudo mkdir /var/www/html/phalcon-blue
sudo cp /var/www/html/phalcon-blue/deploy/nginx.conf /etc/nginx/sites-available/default
sudo service nginx restart



#sudo su postgres -c "cmd here"
