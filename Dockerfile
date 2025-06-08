FROM php:8.2-apache

# Instala dependências e extensões necessárias
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    libonig-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql mysqli

# Ativa mod_rewrite do apache
RUN a2enmod rewrite

# Copia seu código para o Apache
COPY . /var/www/html/

# Expõe a porta 80
EXPOSE 80

CMD ["apache2-foreground"]
