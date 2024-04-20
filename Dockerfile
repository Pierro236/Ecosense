# Utilisez une image PHP officielle comme base
FROM php:7.4-apache

# Installez les dépendances PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiez les fichiers de votre application dans le conteneur
COPY . /var/www/html

# Exposez le port Apache
EXPOSE 80
