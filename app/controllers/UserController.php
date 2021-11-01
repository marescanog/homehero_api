<?php

namespace App\Controllers;

use App\Response\CustomResponse;
use App\db\DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController{

    protected $customResponse;

    public function __construct(){
        $this->customResponse = new CustomResponse();
    }

    public function getAll(Request $request, Response $response){

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
    
            $this->customResponse->is200Response($response, $data);
    
        } catch (PDOException $e){
            $status = 500;
            $error = array(
                "message" => "There was an error processing your request",
                "status" => $status,
                "data" => array(),
                "error" => $e->getMessage(),
            );

            $this->customResponse->is200Response($response, $error);
        }


    }

    public function getSingleUser(Request $request, Response $response){
        $responseMessage = "get Single user works";
        $this->customResponse->is200Response($response, $responseMessage);
    }

}