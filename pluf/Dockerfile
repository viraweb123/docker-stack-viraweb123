
# Dockerfile
#
# SEE: https://github.com/docker-library/php/blob/67efd89c36bf15cb5ba096213e0536b2cab5eb38/7.2/stretch/apache/Dockerfile
# SEE: https://hub.docker.com/layers/php/library/php/7.4.5-apache/images/sha256-f615d3f76fd98e1dde792e4ad514175d652e18c9d3400c94783d0c10354bbc95?context=explore
#
FROM php:7.4.5-apache
MAINTAINER ViraWeb123 (info@viraweb123.com)

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_ALLOW_SUPERUSER 0

###########################################################
# Build process
###########################################################
RUN mkdir -p /usr/share/man/man1

#
# Installl all required applications
#
RUN apt-get update && \
	apt-get install -y --no-install-recommends \
		libonig-dev \
		libzip-dev \
		libssl-dev \
		libcurl4-openssl-dev \
		curl \
		wget \
		zlib1g-dev \
		zip \
		unzip \
		default-jre \
		git && \
	rm -rf /var/lib/apt/lists/\*

#
# Install extenstions
#
RUN docker-php-source extract && \
	# Install extensions
	docker-php-ext-install ctype &&\
	docker-php-ext-install openssl || \
		( mv /usr/src/php/ext/openssl/config0.m4 /usr/src/php/ext/openssl/config.m4 && \
			docker-php-ext-install openssl ) && \
	docker-php-ext-install json && \
	docker-php-ext-install mbstring && \
	docker-php-ext-install mysqli && \
	docker-php-ext-install zip && \
	docker-php-ext-install bcmath && \
	# Enable extensions
	docker-php-ext-enable zip && \
	docker-php-ext-enable mysqli && \
	docker-php-ext-enable json mbstring && \
	docker-php-ext-enable ctype openssl && \
	# enable PHP mode
	a2enmod rewrite && \
	a2enmod ssl && \
	# Delete source
	docker-php-source delete

# Install APCu
RUN pecl install apcu \
    && docker-php-ext-enable apcu --ini-name 10-docker-php-ext-apcu.ini


RUN wget https://dl.eff.org/certbot-auto && \
	mv certbot-auto /usr/local/bin/certbot-auto && \
	chown root /usr/local/bin/certbot-auto && \
	chmod 0755 /usr/local/bin/certbot-auto && \
	echo "0 0,12 * * * root python -c 'import random; import time; time.sleep(random.random() * 3600)' && /usr/local/bin/certbot-auto renew" | tee -a /etc/crontab > /dev/null



# files
COPY composer.json /var/www/
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
COPY update_db.sh /var/www/
RUN chmod 777 /var/www/storage/ && \
	chmod 777 /var/www/logs/ && \
	chmod +x /var/www/run.sh && \
	chmod +x /var/www/update_db.sh && \
	cd /var/www/ && \
	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
	php composer-setup.php  && \
	php composer.phar install --no-plugins --no-scripts


# Change directory to the html
WORKDIR /var/www/html
CMD ["/var/www/run.sh"]
