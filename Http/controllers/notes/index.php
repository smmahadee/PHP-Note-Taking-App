<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('SELECT * from notes where user_id=1', [])->get();

view("notes/index.view.php", [
    'heading' => 'Notes',
    'notes' => $notes
]);


