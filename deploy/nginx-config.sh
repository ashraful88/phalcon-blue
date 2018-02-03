#!/bin/bash

sudo cp ./deploy/nginx.conf /etc/nginx/sites-available/default
sudo service nginx restart
