<?php

use Core\App;
use Core\Database;

$currentUserId = 1;

$db = App::resolve(Database::class);

$id = $_POST['id'];

$note = $db->query("SELECT * from notes where id= :id", [':id' => $id])->findOrFail();


if (!$note) {
    abort();
}

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE from notes where id=:id', [':id' => $id]);

header('Location: /notes');
exit();