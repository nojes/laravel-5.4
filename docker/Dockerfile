#
#--------------------------------------------------------------------------
# Image Setup
#--------------------------------------------------------------------------
#
FROM laradock/php-fpm:2.0-71

MAINTAINER Vyacheslav Nozhenko <vv.nojenko@gmail.com>

#
#--------------------------------------------------------------------------
# Software's Installation
#--------------------------------------------------------------------------
#
RUN apt-get update

RUN apt-get install -y --no-install-recommends \
    zip \
    unzip \
    git \
    nano \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

#####################################
# Composer:
#####################################

# Install composer and add its bin to the PATH.
RUN curl -s http://getcomposer.org/installer | php && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer

#
#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#
EXPOSE 9000

RUN groupadd -g 1000 docker && \
    useradd -u 1000 -g docker -m docker

RUN usermod -u 1001 www-data

WORKDIR /var/www/laravel-employees

COPY "entrypoint.sh" "/entrypoint.sh"
RUN chmod +x /entrypoint.sh

USER docker

CMD ["/entrypoint.sh"]
