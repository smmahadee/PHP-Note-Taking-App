<?php

use Core\App;
use Core\Database;

$currentUserId = 1;

$db = App::resolve(Database::class);

// Get the note ID
$id = $_GET['id'];

// fetch the data
$note = $db->query("SELECT * from notes where id= :id", [':id' => $id])->findOrFail();


if (!$note) {
    abort();
}

authorize($note['user_id'] === $currentUserId);



view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'note' => $note,
    'errors' => []
]);