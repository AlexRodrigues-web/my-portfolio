# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Copia todo seu código para a pasta padrão do apache
COPY . /var/www/html/

# Ativa mod_rewrite do apache (útil para urls amigáveis)
RUN a2enmod rewrite

# Exponha a porta 80
EXPOSE 80

# Comando para rodar o apache em primeiro plano
CMD ["apache2-foreground"]
