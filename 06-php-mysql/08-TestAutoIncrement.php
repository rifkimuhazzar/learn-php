<?php

require_once "03-getConnection.php";

$connection = getConnection();

$connection->exec("insert into comments(email, comment) values ('rifki@test.com', 'Hello')");
$id = $connection->lastInsertId(); // untuk mengetahui id terakhir yang di insert
echo $id . PHP_EOL;




$connection = null;