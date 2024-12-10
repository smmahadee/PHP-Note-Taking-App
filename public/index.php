<?php

use Core\Router;
use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . '/vendor/autoload.php';

require BASE_PATH . "core/functions.php";

// spl_autoload_register(function ($class) {
//     $class = str_replace('\\', '/', $class);

//     require base_path("{$class}.php");
// });

require base_path("core/Bootstrap.php");

$router = new Router();
$routes = require base_path("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    redirect($_SERVER['HTTP_REFERER']);
}

Session::unflash();
