<?php

require_once "03-getConnection.php";

$connection = getConnection();

$connection->beginTransaction(); // mulai transaction, untuk auto increment terus bertambah

$connection->exec("insert into comments (email, comment) values ('rifki@test.com', 'hi')");
$connection->exec("insert into comments (email, comment) values ('rifki@test.com', 'hi')");
$connection->exec("insert into comments (email, comment) values ('rifki@test.com', 'hi')");
$connection->exec("insert into comments (email, comment) values ('rifki@test.com', 'hi')");
$connection->exec("insert into comments (email, comment) values ('rifki@test.com', 'hi')");

$connection->rollBack(); // membalikan atau membatalkan perintah setelah beginTransaction()



$connection = null;