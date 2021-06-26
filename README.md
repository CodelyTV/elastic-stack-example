# Elastic Stack with Docker
![Build Elastic Stack](https://github.com/CodelyTV/elastic-stack-example/workflows/Build%20Elastic%20Stack/badge.svg)

## How to run the Stack

To initialize all the needed services.

```
docker-compose up -d 
```  

## How to run PHP sample app

Install needed PHP dependencies

```
docker-compose run --rm composer composer install --ignore-platform-reqs
```  

Execute the PHP sample application

```
docker-compose run --rm php php app.php -a fo1 -b bar
```
