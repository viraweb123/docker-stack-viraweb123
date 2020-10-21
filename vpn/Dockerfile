
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
#
# Installl all required applications
#
RUN apt-get update && \
	apt-get install -y --no-install-recommends \
		libonig-dev \
		libzip-dev \
		curl \
		zlib1g-dev \
		zip \
		unzip && \
	rm -rf /var/lib/apt/lists/\*

#
# Install extenstions
#
RUN docker-php-source extract && \
	# Install extensions
	docker-php-ext-install ctype &&\
	docker-php-ext-install json && \
	docker-php-ext-install mbstring && \
	docker-php-ext-install mysqli && \
	docker-php-ext-install zip && \
	docker-php-ext-install bcmath && \
	# Enable extensions
	docker-php-ext-enable zip && \
	docker-php-ext-enable mysqli && \
	docker-php-ext-enable json mbstring && \
	docker-php-ext-enable ctype && \
	# enable PHP mode
	a2enmod rewrite && \
	# Delete source
	docker-php-source delete

# files
COPY composer.json /var/www/
COPY html/ /var/www/html/
COPY run.sh /var/www/
RUN chmod +x /var/www/run.sh && \
	cd /var/www/ && \
	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
	php composer-setup.php  && \
	php composer.phar install --no-plugins --no-scripts


# Change directory to the html
WORKDIR /var/www/html
CMD ["/var/www/run.sh"]
