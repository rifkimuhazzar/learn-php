<?php
session_start(); // untuk menjalankan session atau agar sessionnya bisa di ubah atau di tambah

if ($_SESSION["login"] == true) {
  header("Location: /session/12-member.php");
  exit();
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($_POST["username"] == "rifki" && $_POST["password"] == "rifki123") {
    // sukses login
    $_SESSION["login"] = true;
    $_SESSION["username"] = "rifki";
    header("Location: /session/12-member.php");
    exit();
  } else {
    // gagal login
    $error = "Login gagal";
  }
}
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
  <?php if ($error != "") { ?>
    <h2><?= $error ?></h2>
  <?php } ?>

  <h1>Login</h1>
  <form action="/session/12-login.php" method="POST">
    <label>Username :
      <input type="text" name="username">
    </label>
    <br>
    <label>Password :
      <input type="password" name="password">
    </label>
    <br>
    <button type="submit">Login</button>
  </form>
</body>
</html>