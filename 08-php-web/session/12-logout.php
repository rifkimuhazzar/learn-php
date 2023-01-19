<?php
session_start();
session_destroy(); // menghapus semua session

header("Location: /session/12-login.php");
exit();