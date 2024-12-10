<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$body = $_POST['body'];

$errors = [];

if (!Validator::string($body, 1, 1000)) {
    $errors['body'] = "Body  not more than 1000 character is required. ";
}

if (!empty($errors)) {
    view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query("INSERT INTO `myapp`.`notes` (`body`, `user_id`) VALUES (:body, :userId)", [':body' => $_POST['body'], ":userId" => 1]);

header('Location: /notes');
exit();