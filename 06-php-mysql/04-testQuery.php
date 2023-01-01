<?php

require_once "03-getConnection.php";

$connection = getConnection();

// query() memiliki return value PDOStatement
// query() biasa digunakan untuk SELECT
// PDOStatement adalah turunan interface InteratorAggregate, jadi bisa menggunakan foreach
$sql = "select id, name, email from customers";
$statement = $connection->query($sql);

foreach($statement as $row) {
  $id = $row["id"];
  $name = $row[1];
  $email = $row["email"];

  echo "ID : $id" . PHP_EOL;
  echo "Name : $name" . PHP_EOL;
  echo "Email : $email" . PHP_EOL;
}




$connection = null;
