<?php
// loader is the first piece of code that runs when a machine starts, and is responsible for loading the rest of the app

use Slim\App;
// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
require_once  __DIR__ . '/../vendor/autoload.php';

$settings = require_once  __DIR__ . '/settings.php';

$app = new App($settings);

$container = $app->getContainer();

// $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
//     $name = $args['name'];
//     $response->getBody()->write("Hello, $name");
//     return $response;
// });

$app->run();