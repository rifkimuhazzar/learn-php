<?php

require_once "03-getConnection.php";

$connection = getConnection();

$username = "rifki";
$password = "rifki123";

$sql = "select * from admin where username = :un and password = :password";
$statement = $connection->prepare($sql);
$statement->bindParam("un", $username);
$statement->bindParam("password", $password);
$statement->execute();

// menggunakan fetch lebih simple dari pada foreach
// fetch() mengkonversi datanay ke array
if ($row = $statement->fetch()) {
  echo "Sukses login : " . $row["username"] . PHP_EOL;
} else {
  echo "Gagal login" . PHP_EOL;
}
var_dump($statement->fetch()); // ini akan false karena datanya sudah di fetch


$connection = null;