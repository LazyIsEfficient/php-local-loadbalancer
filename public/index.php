<?php

use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$log = new Logger('php');
$log->pushHandler(new StreamHandler(__DIR__ . '/../logs/php-app.log', Level::Info));

$app = AppFactory::create();


$app->get('/', function (Request $request, Response $response, array $args) use ($log) {
    $response->getBody()->write(\json_encode($request->getServerParams()));
    $log->info('REQUEST HANDLED ON', [
        $request->getServerParams()['SERVER_ADDR'],
        $request->getServerParams()['HOSTNAME']
    ]);
    return $response;
});

$app->run();