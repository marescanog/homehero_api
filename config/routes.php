<?php

$app->get('/users/all', "UserController:getAll");

$app->get('/users/{id}', "UserController:getSingleUser");

$app->group( "/auth", function() use ($app){
    $app->post("/login", "AuthController:login");
    $app->post("/register", "AuthController:Register");
});