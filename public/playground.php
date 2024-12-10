<?php

use Illuminate\Support\Collection;

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . '/vendor/autoload.php';
require BASE_PATH . "core/functions.php";


$numbers = new Collection([1, 2, 3, 4]);

$filteredNumbers = $numbers->contains(2);

dd($filteredNumbers);