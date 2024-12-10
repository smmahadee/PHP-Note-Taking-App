<?php

use Core\Response;
use Core\Router;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($url) {
    return $_SERVER['REQUEST_URI'] === $url;
}

function authorize($condition, $stateCode = Response::FORBIDDEN) {
    if (!$condition) {
        abort($stateCode);
    }

    return true;
}

function abort($statusCode = Response::NOT_FOUND) {
    http_response_code($statusCode);

    require base_path("./views/{$statusCode}.view.php");
    die();
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);

    require base_path("views/{$path}");
}

function redirect($path) {
    header("Location: {$path}");
    exit();
}

function old($key, $default = '') {
    return Core\Session::get('old')[$key] ?? $default;
}