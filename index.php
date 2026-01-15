<?php
require_once 'bootstrap.php';

$router = new Router();
$router->add('GET', '/', 'PostController@index');
$router->add('GET', '/posts', 'PostController@index');
$router->add('GET', '/posts/create', 'PostController@create');
$router->add('POST', '/posts', 'PostController@create');
$router->add('GET', '/posts/{id}', 'PostController@show');
$router->add('GET', '/posts/{id}/edit', 'PostController@edit');
$router->add('POST', '/posts/{id}', 'PostController@update');
$router->add('POST', '/posts/{id}/delete', 'PostController@delete');
$router->add('GET', '/login', 'AuthController@login');
$router->add('POST', '/login', 'AuthController@login');
$router->add('GET', '/register', 'AuthController@register');
$router->add('POST', '/register', 'AuthController@register');
$router->add('POST', '/logout', 'AuthController@logout');

$router->dispatch();