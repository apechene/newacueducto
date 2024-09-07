# Usa la imagen oficial de PHP con Apache
FROM php:7.4-apache

# Instala extensiones de PHP necesarias para tu aplicación
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copia los archivos de tu aplicación al directorio de trabajo del contenedor
COPY . /var/www/html/


# Establece el directorio de trabajo
WORKDIR /var/www/html

# Expone el puerto 80 para acceder a la aplicación a través del navegador
EXPOSE 80

# Inicia el servidor Apache
CMD ["apache2-foreground"]

# Otorga permisos al directorio /var/www/html/php/
RUN chmod -R 777 /var/www/html/php/
