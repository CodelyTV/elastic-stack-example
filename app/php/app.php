<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;
use Elastica\Client;
use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\ErrorLogHandler;
use Monolog\Handler\RotatingFileHandler;

// create a log channel
$log = new Logger('logger');

//Log to stdout
$stdoutHandler = new ErrorLogHandler();
$formatter = new JsonFormatter();
$stdoutHandler->setFormatter($formatter);
$log->pushHandler($stdoutHandler);

// File Handler
$fileHandler = new RotatingFileHandler(__DIR__.'/logs/app.log', 0, \Monolog\Level::Debug);
$formatter = new JsonFormatter();
$fileHandler->setFormatter($formatter);
$log->pushHandler($fileHandler);

// Elasticsearch Handler
$elasticaClient = new Client(
    [
        'host' => 'elasticsearch',
        'port' => 9200,
        'transport' => 'http',
        'username' => 'elastic',
        'password' => 'password',
        'auth' => ["elastic", "password"],
        'hosts' => ['elasticsearch:9200'],
    ]
);

$elasticsearchHandler = new \Monolog\Handler\ElasticaHandler($elasticaClient, ['index' => 'codelytv', 'type' => 'record']);

// Register Handlers
$log->pushHandler($stdoutHandler);
$log->pushHandler($elasticsearchHandler);

// My Application
$options = getopt('a:b:');

# App Servidor A
if ($options['a'] === 'warning') {
    $log->warn('Esto es un Warning', ['Servidor' => 'Servidor A']);
} else {
    $log->info('Esto es un Info', ['Servidor' => 'Servidor A']);
}

# App Servidor B
if ($options['b'] === 'error') {
    $log->error('Esto es un Error', ['Servidor' => 'Servidor B']);
} else {
    $log->info('Esto es un Info', ['Servidor' => 'Servidor B']);
}



