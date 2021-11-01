<?php

// $app->get('/users/all', "UserController:getAll");

// $app->get('/users/{id}', "UserController:getSingleUser");

// $app->group( "/auth", function() use ($app){
    // $app->post("/login", "AuthController:login");
    // $app->post("/register", "AuthController:Register");
// });


$app->post("/create-guest","GuestEntryController:createGuest");

$app->get("/view-guests" ,"GuestEntryController:viewGuests");

$app->get("/get-single-guest/{id}","GuestEntryController:getSingleGuest");

$app->patch("/edit-single-guest/{id}","GuestEntryController:editGuest");

$app->delete("/delete-guest/{id}","GuestEntryController:deleteGuest");

$app->get("/count-guests" ,"GuestEntryController:countGuests");


$app->group("/auth",function() use ($app){

    $app->post("/login","AuthController:Login");
    $app->post("/register","AuthController:Register");
});