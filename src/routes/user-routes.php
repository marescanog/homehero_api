<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

$app->get('/users/all', function(Request $request, Response $response){
    $sql = "SELECT * FROM hh_user";
    $status = 400;

    try{
        $db = new DB();
        $conn = $db->connect();
    
        $stmt = $conn->query($sql);
        $users = $stmt->fetchAll();
        $db = null;

        $data = array(
            'users' => $users,
            "message" => "Success"
        );

        $status = 200;

        $newResponse = $response->withHeader('Content-type', 'application/json');

        echo json_encode($data, JSON_PRETTY_PRINT);

    } catch (PDOException $e){
        $status = 500;
        $error = array(
            "message" => $e->getMessage()
        );

        $newResponse = $response->withHeader('Content-type', 'application/json');
        echo json_encode($error);
    }
});