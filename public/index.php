<?php

use Exceptions\RouteNotFoundException;
use Router\Router;


require "../vendor/autoload.php";

$router = new Router();

$router->register('/', function () {
    return 'HomePage';
});

$router->register('/contact', function () {
    return 'Contact Page';
});

echo '<pre>';
// var_dump($router);
// Meme si tu tapes "/con" si ça n'existe pas, tu seras redirigé vers "/"
var_dump($_SERVER['REQUEST_URI']);

// Explode permet de se débarasser des trucs
// var_dump(explode('?', $_SERVER['REQUEST_URI']));

echo '<pre/>';

try {
    echo $router->resolve($_SERVER['REQUEST_URI']);
} catch (RouteNotFoundException $e) {
    echo $e->getMessage();
}
