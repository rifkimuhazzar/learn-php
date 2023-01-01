<?php

require_once "03-getConnection.php";

$connection = getConnection();

$username = "rifki";
$password = "rifki123";

$sql = "select * from admin where username = ? and password = ?";
$statement = $connection->prepare($sql);
// tanpa menggunakan bindParam() tapi perintah sqlnya harus pakai ?
$statement->execute([$username, $password]); 

$success = false;
$find_user = null;

foreach ($statement as $row) {
  // sukses
  $success = true;
  $find_user = $row["username"];
}

if ($success) {
  echo "Sukses login : " . $find_user . PHP_EOL;
} else {
  echo "Gagal login" . PHP_EOL;
}



$connection = null;