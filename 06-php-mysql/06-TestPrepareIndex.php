<?php

require_once "03-getConnection.php";

$connection = getConnection();

$username = "rifki";
$password = "rifki123";
// prepare() direkomendasikan di gunakan ketika querynya ada input dari luar
// prepare() menghasilkan object PDOStatement
$sql = "select * from admin where username = ? and password = ?"; // tanda tanya sebagai index
$statement = $connection->prepare($sql); // prepare() secara otomatis sudah quote()
// Binding Parameter dengan index dimulai dari 0, tapi di bindparam dimulai dari 1
$statement->bindParam(1, $username);
$statement->bindParam(2, $password);
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