<?php

namespace App\Controllers;

use App\Response\CustomResponse;
use App\db\DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class GuestEntryController
{

    protected  $customResponse;


    public function  __construct()
    {
        $db = new DB();
        $conn = $db->connect();
        $db = null;
         $this->customResponse = new CustomResponse();

    }

    public function createGuest(Request $request,Response $response)
    {

        $responseMessage = "get Single user works";
        $this->customResponse->is200Response($response, $responseMessage);

    }

    public function viewGuests(Request $request,Response $response)
    {
        $responseMessage = "get Single user works";
        $this->customResponse->is200Response($response, $responseMessage);
    }


    public function getSingleGuest(Request $request,Response $response,$id)
    {

        $responseMessage = "get Single user works";
        $this->customResponse->is200Response($response, $responseMessage);
    }

    public function editGuest(Request $request,Response $response,$id)
    {
        $responseMessage = "get Single user works";
        $this->customResponse->is200Response($response, $responseMessage);
    }

    public function deleteGuest(Request $request,Response $response,$id)
    {
        $responseMessage = "get Single user works";
        $this->customResponse->is200Response($response, $responseMessage);
    }

    public function countGuests(Request $request,Response $response)
    {
        $responseMessage = "get Single user works";
        $this->customResponse->is200Response($response, $responseMessage);
    }

}