FROM php:8.1-apache

# ------------------------------------------------------------------------------
# Criar diretório
# ------------------------------------------------------------------------------
WORKDIR /var/www/app

# ------------------------------------------------------------------------------
# Instalação de pacotes
# ------------------------------------------------------------------------------

RUN apt-get update
RUN apt-get install -y zlib1g-dev \
   libxml2-dev \
   nano \
   cron \
   curl \
   libzip-dev \
   libpng-dev \
   libpq-dev \
   libc-client-dev \
   libkrb5-dev \
   wget \
   supervisor \
   git \
   gnupg \
   bzip2 \
   freetds-bin \
   freetds-dev \
   freetds-common \
   rsync && \
   apt-get clean -y

# ------------------------------------------------------------------------------
# Habilitação de extensões php
# ------------------------------------------------------------------------------
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# ------------------------------------------------------------------------------
# Instalar o composer
# ------------------------------------------------------------------------------
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# ------------------------------------------------------------------------------
# ServerName para evitar erros, e habilitação de extensões do PHP
# ------------------------------------------------------------------------------
RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf && a2enmod rewrite ssl