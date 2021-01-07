FROM pgroot/php:7.3.25

COPY . /var/www/html
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
COPY entrypoint.sh /usr/local/bin/entrypoint
WORKDIR /var/www/html

RUN composer install \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 0777 /var/www/html/storage \
    && a2enmod rewrite \
    && chmod u+x /usr/local/bin/entrypoint \
    && cp .env.example .env

CMD ["/usr/local/bin/entrypoint"]
