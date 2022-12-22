<?php

require_once "data/08-conflict.php";

$conflict = new data\Conflict();
$conflict = new data\two\Conflict();

echo say\APP . PHP_EOL;
say\sayHello();