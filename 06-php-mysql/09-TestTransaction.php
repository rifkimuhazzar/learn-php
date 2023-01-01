<?php

require_once "03-getConnection.php";

$connection = getConnection();

$connection->beginTransaction(); // mulai transaction, untuk auto increment terus bertambah

$connection->exec("insert into comments (email, comment) values ('rifki@test.com', 'hi')");
$connection->exec("insert into comments (email, comment) values ('rifki@test.com', 'hi')");
$connection->exec("insert into comments (email, comment) values ('rifki@test.com', 'hi')");
$connection->exec("insert into comments (email, comment) values ('rifki@test.com', 'hi')");
$connection->exec("insert into comments (email, comment) values ('rifki@test.com', 'hi')");

$connection->commit(); // jika ada yang gagal maka semuanya gagal, harus sukses semua agar bisa commit



$connection = null;