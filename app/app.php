<?php

require __DIR__ . '/vendor/autoload.php';

use Monolog\Logger;

// create a log channel
$log = new Logger('logger');

//Log to stdout
$stdoutHandler = new \Monolog\Handler\ErrorLogHandler();
$formatter = new \Monolog\Formatter\JsonFormatter();
$stdoutHandler->setFormatter($formatter);
$log->pushHandler($stdoutHandler);

// File Handler
$fileHandler = new \Monolog\Handler\RotatingFileHandler('../var/logs/app.log', 0, Logger::DEBUG);
$formatter = new \Monolog\Formatter\JsonFormatter();
$fileHandler->setFormatter($formatter);
$log->pushHandler($fileHandler);

// Elasticsearch Handler
$elasticaClient = new \Elastica\Client(
    [
        'host' => 'localhost',
        'port' => 9200
    ]
);

$elasticsearchHandler = new \Monolog\Handler\ElasticSearchHandler($elasticaClient);
//$log->pushHandler($elasticsearchHandler);


// My Application
$options = getopt('a:b:');

if ($options['a'] != 'foo') {
    $log->warn('Input parameter a is not foo', ['parameter' => 'a', 'value' => $options['a'] ]);
} else {
    $log->info('Input parameter a is foo', ['parameter' => 'a', 'value' => $options['a'] ]);
}

if ($options['b'] != 'bar') {
    $log->error('Input parameter b is not bar', ['parameter' => 'b', 'value' => $options['b'] ]);
} else {
    $log->info('Input parameter b is bar', ['parameter' => 'b', 'value' => $options['b'] ]);
}



