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
    try{
        $db = new DB();
        $conn = $db->connect();
        
        $status = 400;
        $message = "";

        $sql = "SELECT * FROM hh_user";
        $stmt = $conn->query($sql);
        $users = $stmt->fetchAll();
        $db = null;
        
        $message = "";
        $status = 200;
        $data = array(
            "message" => $message,
            "status" => $status,
            "data" => $users,
        );

        $newResponse = $response->withHeader('Content-type', 'application/json');

        echo json_encode($data, JSON_PRETTY_PRINT);

    } catch (PDOException $e){
        $status = 500;
        $error = array(
            "message" => "There was an error processing your request",
            "status" => $status,
            "data" => array(),
            "error" => $e->getMessage(),
        );
        $newResponse = $response->withHeader('Content-type', 'application/json');
        echo json_encode($error);
    }
});