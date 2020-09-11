<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/signin', 'LoginController@signin');
$router->post('/signin', 'LoginController@signinAction');

$router->get('/register', 'LoginController@signup');
$router->post('/register', 'LoginController@signupAction');