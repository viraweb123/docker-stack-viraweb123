#!/bin/bash

chmod 777 /var/www/storage/
chmod 777 /var/www/logs/
rm -rf /tmp/Pluf*
# Run Apcache2 froground application
cd "/var/www/html"
apache2-foreground
