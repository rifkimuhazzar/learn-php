<?php

$host = "localhost";
$port = "3306";
$database = "belajar_php_database";
$username = "root";
$password = "G34r-up.my";

try {
  $connection = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
  echo "Sukses terkoneksi ke database MySQL" . PHP_EOL;

  // menutup koneksi ke database | wajib di lakukan setelah selesai operasi ke databasenya
  $connection = null;
} catch (PDOException $exception) {
  echo "Gagal terkoneksi ke database MySQL" . $exception->getMessage() . PHP_EOL;
}