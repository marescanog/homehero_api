<?php

return function($container){
    $container['UserController'] = function(){
        return new \App\Controllers\UserController;
    };
};