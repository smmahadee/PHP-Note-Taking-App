<?php

use Core\Session;
use Core\ValidationException;
use Http\Forms\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$form = LoginForm::validate([
    'email' => $email,
    'password' => $password
]);


$signedIn = (new Authenticator)->attemt($email, $password);

if (!$signedIn) {
    $form->error('email', 'Credentials didn\'t match')->throw();
}

redirect('/');




