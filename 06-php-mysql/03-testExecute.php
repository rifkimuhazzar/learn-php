<?php

require_once "03-getConnection.php";

$connection = getConnection();

$sql = <<<SQL
  insert into customers (id, name, email)
  values ("frontend", "Frontend", "frontend@test.com");
SQL;

// exec() adalah function bawaan dari pdo
// exec() tidak ada return value
// exce() bisa digunakan untuk semua perintah sql, tapi biasanya di gunakan untuk dml saja.
$connection->exec($sql);





$connection = null;