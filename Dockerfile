FROM composer:1.10.9
COPY . /app
    # composer 阿里云源
RUN composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/ && \
    composer install --no-dev --ignore-platform-reqs
    
FROM php:7.4.8-apache
COPY --from=0 /app /var/www/app
COPY ./apache/*.so /usr/local/lib/php/extensions/no-debug-non-zts-20190902/
COPY ./apache/ext-custom.ini /usr/local/etc/php/conf.d/ext-custom.ini
COPY ./apache/default.conf /etc/apache2/sites-enabled/000-default.conf
WORKDIR /var/www/app

RUN cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load