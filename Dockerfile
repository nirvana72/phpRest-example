FROM composer:2.0.9
COPY . /app
    # composer 阿里云源
RUN composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/ && \
    composer install --no-dev --ignore-platform-reqs
    
FROM php:7.4.14-apache
RUN  docker-php-ext-install mysqli pdo_mysql && \
     # apache
     cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load && \
     # 移除安装目录
     rm -rf /usr/src/php

COPY --from=0 /app /var/www/app
# pecl 安装太慢了.so 文件提前准备好
COPY ./apache/*.so /usr/local/lib/php/extensions/no-debug-non-zts-20190902/
COPY ./apache/ext-custom.ini /usr/local/etc/php/conf.d/ext-custom.ini
COPY ./apache/default.conf /etc/apache2/sites-enabled/000-default.conf
WORKDIR /var/www/app


# docker build -t dev/phprest-example:1.0 .
# docker save -o phprest-example.tar dev/phprest-example:1.0
# docker load -i phprest-example.tar
# docker run --name=phprest-example -v /home/env/phprest-example.env:/var/www/app/.env -v /home/logs/phprest-example:/var/www/app/logs --network my_net1 -d dev/phprest-example:1.0

docker run --name=phprest-example -v /home/logs/phprest-example:/var/www/app/logs --network my_net1 -d dev/phprest-example:1.0
