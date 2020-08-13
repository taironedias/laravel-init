<p align="center"><img src="/.resources/g3807.png" width="400"></p>

## This project

- php:7.2-fpm
- nginx:alpine
- mysql:5.7.22
- composer:1.10.10

## Step 1 — Downloading Laravel and Installing Dependencies

```bash
cd ~

git clone https://github.com/laravel/laravel.git NAME_YOUR_PROJECT

cd ~/NAME_YOUR_PROJECT

docker run --rm -v $(pwd):/app composer install

sudo chown -R $USER:$USER ~/NAME_YOUR_PROJECT
```

> Note: All files and directories created in the next steps are inside the NAME_YOUR_PROJECT folder

## Step 2 — Creating the Docker Compose File and Persisting Data

```bash
# create docker-compose.yml file
touch docker-compose.yml
```
Inside the `docker-compose.yml` add the following configuration:

```yaml
version: '3'
services:
  #PHP Service
  app:
    build:
      context: .
      dockerfile: Dockerfile
    image: digitalocean.com/php
    container_name: app
    restart: unless-stopped
    tty: true
    environment:
      SERVICE_NAME: app
      SERVICE_TAGS: dev
    working_dir: /var/www
    volumes:
      - ./:/var/www
      - ./php/local.ini:/usr/local/etc/php/conf.d/local.ini
    networks:
      - app-network

  #Nginx Service
  webserver:
    image: nginx:alpine
    container_name: webserver
    restart: unless-stopped
    tty: true
    ports:
      - "80:80"
      - "443:443"
    volumes:
      - ./:/var/www
      - ./nginx/conf.d/:/etc/nginx/conf.d/
    networks:
      - app-network

  #MySQL Service
  db:
    image: mysql:5.7.22
    container_name: db
    restart: unless-stopped
    tty: true
    ports:
      - "3306:3306"
    environment:
      MYSQL_DATABASE: laravel
      MYSQL_ROOT_PASSWORD: root
      SERVICE_TAGS: dev
      SERVICE_NAME: mysql
    volumes:
      - dbdata:/var/lib/mysql
      - ./mysql/my.cnf:/etc/mysql/my.cnf
    networks:
      - app-network

#Docker Networks
networks:
  app-network:

#Volumes
volumes:
  dbdata:
```

## Step 3 — Creating the Dockerfile
```bash
# create Dockerfile file
touch Dockerfile
```
Inside the `Dockerfile` add the following configuration:


```Dockerfile
FROM php:7.4-fpm

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql zip exif pcntl
RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
```

## Step 4 — Configuring PHP

```bash
# create the php directory
mkdir php

# next, create the local.ini file
touch php/local.ini
```
To demonstrate how to configure PHP, add inside `local.ini` the following code to set size limitations for uploaded files:
```ini
upload_max_filesize=40M
post_max_size=40M
```

## Step 5 — Configuring Nginx
```bash
# create the nginx and conf.d directory
mkdir -p nginx/conf.d

# next, create the app.conf file
touch nginx/conf.d/app.conf
```
Add the following code to the file to specify your Nginx configuration:
```conf
server {
    listen 80;
    index index.php index.html;
    error_log  /var/log/nginx/error.log;
    access_log /var/log/nginx/access.log;
    root /var/www/public;
    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass app:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }
    location / {
        try_files $uri $uri/ /index.php?$query_string;
        gzip_static on;
    }
}
```

## Step 6 — Configuring MySQL

```bash
# create the mysql directory
mkdir mysql

# next, create the my.cnf file
touch mysql/my.cnf
```
In the file, add the following code to enable the query log and set the log file location:
```cnf
[mysqld]
general_log = 1
general_log_file = /var/lib/mysql/general.log
```

## Step 7 — Modifying Environment Settings and Running the Containers

```bash
cp .env.example .env
```

Open the `.env` file using vscode and find the block that specifies `DB_CONNECTION` and update it to reflect the specifics of your setup.

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=larauser
DB_PASSWORD=YOUR_DB_PASSWORD_DEFINIED_DOCKER_COMPOSE
```

Save all your changes and build the `docker-compose.yml`

```bash
docker-compose up -d --build
```

Once the process is complete, use the following command to list all of the running containers:
```bash
docker ps
```
The following command will generate a key and copy it to your .env file, ensuring that your user sessions and encrypted data remain secure:
```bash
docker-compose exec app php artisan key:generate
```

You now have the environment settings required to run your application. To cache these settings into a file, which will boost your application’s load speed, run:

```bash
docker-compose exec app php artisan config:cache
```

## Step 8 — Add Bootstrap in Laravel Project
Initially, download the dependencies for the project:
```bash
docker-compose exec app composer require laravel/ui

# so, installed bootstrap scaffolding
docker-compose exec app php artisan ui bootstrap

# and running
docker-compose exec app php artisan ui bootstrap --auth
```
So, execute the instructions in javascript to be added to the project:
```bash
# download the dependencies
docker run --rm -v $(pwd):/app -w /app node npm install

# run the dependencies
docker run --rm -v $(pwd):/app -w /app node npm run dev

```

Check your browser `http://localhost:80`... :smile: