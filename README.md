# Elastic Stack with Docker
![Build Elastic Stack](https://github.com/CodelyTV/elastic-stack-example/workflows/Build%20Elastic%20Stack/badge.svg)

## How to run the Stack
To initialize all the needed services.

```
docker-compose up -d 
```  

## How to query the Stack directly
Https and authentication have been disabled for the sake of simplicity.

```
curl --location --request GET 'http://localhost:9200/' \
--header 'Content-Type: application/json' \
--data-raw ''
```


## How to run PHP sample app
No local setup is eneded: the php docker-compose service can be used. Access it and install the needed PHP dependencies

```
docker-compose exec php
```  

inside the docker install the dependencies:
```
composer install
```

Execute the PHP sample application within the docker:
```
php app.php -a fo1 -b bar
```
