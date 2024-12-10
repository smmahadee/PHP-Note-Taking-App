<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Validator;

$currentUserId = 1;

$db = App::resolve(Database::class);


$id = $_POST['id'];
$body = $_POST['body'];
$errors = [];

$note = $db->query('SELECT * from notes where id=:id', [':id' => $id])->findOrFail();

if (!$note) {
    abort();
}

authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);

if (!Validator::string($body, 1, 10)) {
    $errors['body'] = "Body  not more than 1000 character is required. ";
}

if (count($errors)) {
    view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'note' => $note,
        'errors' => $errors
    ]);
}

$db->query('UPDATE notes set body=:body where id=:id', [':body' => $body, ':id' => $id]);

header("Location: /notes");
die();