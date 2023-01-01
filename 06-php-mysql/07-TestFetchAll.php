<?php

require_once "03-getConnection.php";

$connection = getConnection();

$sql = "select * from customers";
$statement = $connection->query($sql);

// fetchAll() mengambil semua data di table dan di konversi ke array
$customers = $statement->fetchAll();
var_dump($customers); 


$connection = null;