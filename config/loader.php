<?php
// loader is the first piece of code that runs when a machine starts, and is responsible for loading the rest of the app

use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require_once  __DIR__ . '/../vendor/autoload.php';

$settings = require_once  __DIR__ . '/settings.php';

$app = new App($settings);

$container = $app->getContainer();

// require_once  __DIR__ . '/errHandler.php';

$routeContainers = require_once  __DIR__ . '/routecontainers.php';

$routeContainers($container);

require_once  __DIR__ . '/routes.php';

$middleware = require_once  __DIR__ . '/middleware.php';

$middleware($app);

// COMMENT OUT $dotenv LINES IF PUSH TO PROD
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__."\\..\\");
// $dotenv->load();

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("HomeHero Api successfully connected to ".$_ENV['DB_HOST']);
    return $response;
});

$app->run();