FROM php:7.4.5-cli
RUN docker-php-ext-install mysqli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "./course-index-page.php" ]
