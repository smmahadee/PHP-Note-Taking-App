<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\Authenticator;

$email = $_POST['email'];
$password = $_POST['password'];

// validate inputs
$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Email must be valid';
}

if (!Validator::string($password, 3, 255)) {
    $errors['password'] = 'Password must be atleast 7 character.';
}

if (!empty($errors)) {
    view('register/index.view.php', [
        'errors' => $errors
    ]);
    exit();
}

// check if user alreay exists
$db = App::resolve(Database::class);

$user = $db->query('SELECT * from users where email=:email', [':email' => $email])->find();

// if exists then redirect to home page
if ($user) {
    header('Location: /');
    exit();
}

// otherwise save data to database

if (!$user) {
    $db->query('INSERT INTO `users` (`email`, `password`) VALUES (:email, :password)', [
        ':email' => $email,
        ':password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    (new Authenticator)->login(['email' => $email]);
}
