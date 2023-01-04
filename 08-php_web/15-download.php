<?php

if (isset($_GET["key"]) && $_GET["key"] == "rahasia") {
  // echo "Success Key";
  header("Content-Disposition: attachment; filename=profile.jpg");
  header("Content-Type: image/jpg"); // bisa tanpa content type juga
  readfile(__DIR__ . "/file/image01.jpg");
  exit();
} else {
  echo "Invalid Key";
}