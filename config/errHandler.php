<?php
// This file sets global error handlers for the app such as 500 or 404 errors

// Custom Error Handler
$container["errorHandler"] = function ($container){
    return function ($request, $response, $exception) use ($container){
        return $response->withStatus(500)
            ->withHeader('Content-type','application/json')
            ->write(json_encode(
                array(
                    "success"=>false,
                    "error"=>"INTERNAL_ERROR",
                    "message"=>"something went wrong internally",
                    "status_code"=>"500",
                    "trace"=>$exception->getTraceAsString()
                ),
                JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
            ));
    };
};

// Custom 404 Handler
$container["notFoundHandler"] = function ($container){
    return function ($request, $response, $exception) use ($container){
        return $response->withStatus(404)
            ->withHeader('Content-type','application/json')
            ->write(json_encode(
                array(
                    "success"=>false,
                    "error"=>"NOT_FOUND",
                    "message"=>"EndPoint was not found",
                    "status_code"=>"404",
                ),
                JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
            ));
    };
};

// Ensure PHP Default error handler still set
$container["phpErrorHandler"] = function($container){
    return $container["errorHandler"];
};