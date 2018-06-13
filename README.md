# nasa-web

[![Build Status](https://travis-ci.com/aligntop/nasa-web.svg?branch=master)](https://travis-ci.com/aligntop/nasa-web)

### Needed Tools
- Docker for Mac
- Docker Compose

### Install
```
git clone https://github.com/aligntop/nasa-web.git
cd nasa-web
docker-compose up --build -d
docker-compose exec ww-php-fpm composer install
docker-compose exec ww-php-fpm bin/console server:run 0.0.0.0:8081
```

### Web view
You can navigate to

http://localhost:8081/10/10/3 4 N,2 2 W/RRRR,LLLL [http://localhost:8081/10/10/3%204%20N,2%202%20W/RRRR,LLLL]

### Run PHP Unit
```
docker-compose exec ww-php-fpm ./vendor/bin/phpunit -c phpunit.xml
```

