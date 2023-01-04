<?php
// htmlspecialchars untuk mencegah cross site scripting, yaitu input kode dari user
$say = "Hello " . htmlspecialchars($_GET["name"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1><?= $say ?></h1>
</body>
</html>
