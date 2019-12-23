#
# NOTE: THIS DOCKERFILE IS GENERATED VIA "update.sh"
#
# PLEASE DO NOT EDIT IT DIRECTLY.
#
FROM debian:stretch-slim
MAINTAINER ViraWeb123 (info@viraweb123.com)

###########################################################
# Build process
###########################################################
RUN mkdir -p /usr/share/man/man1
#
# Installl all required applications
#
RUN apt-get update && \
	apt-get install -y --no-install-recommends \
		procps \
		libc6 \
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

# files
COPY bin /root/bin
COPY lib /root/lib

RUN mkdir -p /root/log && \
	mkdir -p /root/var && \
	mkdir -p /root/conf && \
	chmod +x /root/bin/* && \
	apt-get install -y procps libc6

# Change directory to the html
WORKDIR /root/bin
CMD ["./james", "console"]
