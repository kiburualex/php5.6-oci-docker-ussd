FROM alancherosr/php56-oci:latest

# Copy the source code
COPY ./site /var/www/html

# Install PDO MySQL driver
# See https://github.com/docker-library/php/issues/62
# RUN docker-php-ext-install pdo mysql
# RUN docker-php-ext-install pdo mysqli
# RUN docker-php-ext-install soap

# RUN apt-get update -y \
#   && apt-get install -y php5.6-soap

# Workaround for write permission on write to MacOS X volumes
# See https://github.com/boot2docker/boot2docker/pull/534
RUN usermod -u 1000 www-data

# Grant read  permissions
RUN chown -R www-data:www-data /var/www

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Enable Apache mod_rewrite
RUN a2enmod headers

# Enable Apache mod_rewrite
RUN a2enmod expires

RUN apt-get update -y \
    && apt-get install -y php5.6-soap

RUN apt-get install -y php5.6-soap --fix-missing

RUN sed -i 's/extension=php_soap.dll.$/extension=php_soap.dll/;' /etc/php/5.6/apache2/php.ini

# Restart the apache server
RUN service apache2 restart


