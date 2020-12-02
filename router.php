<?php

use SON\Router;

$router = new Router;

$router['/'] = [
    'class' => App\Controllers\UsersController::class,
    'action' => 'index'
];



return $router;