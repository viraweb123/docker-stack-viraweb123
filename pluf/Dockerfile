# Dockerfile
#
# SEE: https://github.com/docker-library/php/blob/67efd89c36bf15cb5ba096213e0536b2cab5eb38/7.2/stretch/apache/Dockerfile
#
FROM php:7.2-apache
MAINTAINER ViraWeb123 (info@viraweb123.com)

###########################################################
# Build process
###########################################################
RUN mkdir -p /usr/share/man/man1
RUN apt-get update && \
	apt-get install -y --no-install-recommends \
		libssl-dev \
		libcurl4-openssl-dev \
		wget \
		vim \
		zlib1g-dev \
		zip \
		unzip \
		default-jre

RUN docker-php-source extract
RUN docker-php-ext-install ctype
RUN \
    docker-php-ext-install openssl || \
    ( mv /usr/src/php/ext/openssl/config0.m4 /usr/src/php/ext/openssl/config.m4 && \
        docker-php-ext-install openssl )
RUN docker-php-ext-enable ctype openssl

# JSON (is loaded)
RUN docker-php-ext-install json
RUN docker-php-ext-install mbstring
RUN docker-php-ext-enable json mbstring

# DB MySQL
RUN docker-php-ext-install mysqli
#RUN docker-php-ext-install mysqlnd
#RUN docker-php-ext-install sqlite3 
RUN docker-php-ext-enable mysqli

#RUN docker-php-ext-install libxml
#RUN docker-php-ext-install xml 
#RUN docker-php-ext-install xmlreader 
#RUN docker-php-ext-install xmlwriter 
#RUN docker-php-ext-install SimpleXML 

RUN docker-php-ext-install zip 
#RUN docker-php-ext-install zlib 
RUN docker-php-ext-enable zip

# Support CURL
#RUN apt-get install --no-install-recommends -y curl
#RUN docker-php-ext-install curl

#RUN docker-php-ext-install bz2
#RUN docker-php-ext-install date
#RUN docker-php-ext-install dom
#RUN docker-php-ext-install filter 
#RUN docker-php-ext-install gettext
#RUN docker-php-ext-install hash
#RUN docker-php-ext-install iconv
#RUN docker-php-ext-install pcntl
#RUN docker-php-ext-install pcre

# Graphics
#RUN docker-php-ext-install gd 
#RUN docker-php-ext-enable gd

# PDO
#RUN docker-php-ext-install PDO 
#RUN docker-php-ext-install pdo_mysql 
#RUN docker-php-ext-install pdo_sqlite 

#RUN docker-php-ext-install Phar 
#RUN docker-php-ext-install Reflection 
#RUN docker-php-ext-install session 
#RUN docker-php-ext-install SPL 
#RUN docker-php-ext-install standard 
#RUN docker-php-ext-install tokenizer 



RUN wget https://dl.eff.org/certbot-auto && \
	mv certbot-auto /usr/local/bin/certbot-auto && \
	chown root /usr/local/bin/certbot-auto && \
	chmod 0755 /usr/local/bin/certbot-auto
RUN echo "0 0,12 * * * root python -c 'import random; import time; time.sleep(random.random() * 3600)' && /usr/local/bin/certbot-auto renew" | tee -a /etc/crontab > /dev/null

# Add composer
WORKDIR /var/www/
RUN apt-get install --no-install-recommends -y git
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
# RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php

WORKDIR /var/www
ENV COMPOSER_ALLOW_SUPERUSER 1
COPY composer.json /var/www/
RUN php composer.phar install --no-plugins --no-scripts
ENV COMPOSER_ALLOW_SUPERUSER 0

# files
COPY etc/ /var/www/etc/
COPY html/ /var/www/html/
COPY lib/ /var/www/lib/
COPY logs/ /var/www/logs/
COPY sql/ /var/www/sql/
COPY storage/ /var/www/storage/
COPY flyway /var/www/
COPY flyway.conf /var/www/
COPY README.md /var/www/
COPY run.sh /var/www/
RUN chmod +x /var/www/run.sh
COPY update_db.sh /var/www/
RUN chmod +x /var/www/update_db.sh

RUN chmod 777 /var/www/storage/
RUN chmod 777 /var/www/logs/

# Remove unused
RUN rm -rf /var/lib/apt/lists/\*
RUN docker-php-source delete

# Change directory to the html
WORKDIR /var/www/html
CMD ["/var/www/run.sh"]

# Disable Apache access.log
RUN rm /var/log/apache2/access.log

# enable PHP mode
RUN a2enmod rewrite
RUN a2enmod ssl

