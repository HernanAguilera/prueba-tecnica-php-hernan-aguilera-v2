# Usamos la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instalamos extensiones necesarias para Doctrine y MySQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql

# Instalamos Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establece el nuevo DocumentRoot
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Habilitamos mod_rewrite de Apache
RUN a2enmod rewrite

# Copiamos los archivos del proyecto a la imagen
WORKDIR /var/www/html
COPY ./project /var/www/html

# Damos permisos adecuados
RUN chown -R www-data:www-data /var/www/html

# Exponemos el puerto 80
EXPOSE 80
