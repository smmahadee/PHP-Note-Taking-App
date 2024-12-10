<?php

// return [
//     '/' => "controllers/index.php",
//     '/about' => "controllers/about.php",
//     '/notes' => "controllers/notes/index.php",
//     '/note' => "controllers/notes/show.php",
//     '/notes/create' => 'controllers/notes/create.php'
// ];


$router->get('/', 'index.php');
$router->get('/about', 'about.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');
$router->delete('/note', 'notes/destroy.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

$router->get('/notes/create', 'notes/create.php');
$router->post('/notes/create', 'notes/store.php');

$router->get('/register', 'register/index.php')->only('guest');
$router->post('/register', 'register/store.php');

$router->get('/session', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
