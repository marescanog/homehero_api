<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
// use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/db.php';

$app = new \Slim\App;

// COMMENT OUT $dotenv LINES IF PUSH TO PROD
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__."\\..\\");
// $dotenv->load();

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello ".$_ENV['DB_HOST']);
    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

// User Routes
require __DIR__ . '/../src/routes/user-routes.php';

$app->run();