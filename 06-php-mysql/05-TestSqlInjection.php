<?php

require_once "03-getConnection.php";

$connection = getConnection();

// bisa menyebabkan sql injection
// $username = "admin'; #"; 
// $password = "admin123";
// jika menggunakan upper case makan warna perintah sqlnya berubah
// membuat query dengan string bisa di sql injection
// $sql = "select * from admin where username = '$username' AND password = '$password';";

// quote() untuk menghindari sql injection, karakter yg tidak lazim adakn di bakcslah \
// ini bisa menyebabkan error jika karakternya tidak lazim
// quote() tidak terlalu di rekomendasikan, karena jika kelupaan quote() nya maka sama saja
$username = $connection->quote("admin'; #"); 
$password = $connection->quote("admin123");
// jika menggunakan quote() , maka tanda ' di querynya harus di hilangkans
$sql = "select * from admin where username = $username AND password = $password;";


echo $sql . PHP_EOL;

// query() dan exec() tidak direkomendsikan jika querynya ada input dari user
// query() dan exec() dipakai jika querynya tidak perlu parameter dari user
$statement = $connection->query($sql);

$success = false;
$find_user = null; // tidak ditambahkan di sini juga bisa

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