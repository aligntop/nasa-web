# werkspot-web

[![Build Status](https://travis-ci.com/aligntop/nasa-web.svg?branch=master)](https://travis-ci.com/aligntop/nasa-web)

### Needed Tools
- Docker for Mac
- Docker Compose

### Install
```
git clone https://github.com/aligntop/nasa-web.git
cd werkspot
docker-compose up --build -d
docker-compose exec php-fpm composer install
```

### Web view
You can navigate to
```
http://0.0.0.0:8081/10/10/34N,22W/RRRR,LLLL
```

### Run PHP Unit
```
docker-compose exec php-fpm ./vendor/bin/phpunit -c phpunit.xml
```

