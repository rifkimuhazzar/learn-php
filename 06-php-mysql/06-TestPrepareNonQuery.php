<?php

require_once "03-getConnection.php";

$connection = getConnection();

$username = "muhazzar";
$password = "muhazzar123";

// bisa menggunakan dengan index ataupun index without bindParam()
$sql = "insert into admin (username, password) values (:username, :password)";
$statement = $connection->prepare($sql);
$statement->bindParam("username", $username);
$statement->bindParam("usernname", $password);
$statement->execute();



$connection = null;