<?php

require_once "03-getConnection.php";

$connection = getConnection();

$username = "admin";
$password = "admin";
// prepare() direkomendasikan di gunakan ketika querynya ada input dari luar
// prepare() menghasilkan object PDOStatement
$sql = "select * from admin where username = :un and password = :password";
$statement = $connection->prepare($sql); // prepare() secara otomatis sudah quote()
// Binding Parameter
$statement->bindParam("un", $username);
$statement->bindParam("password", $password);
$statement->execute(); // untuk mengeksekusi perintah sqlnya

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