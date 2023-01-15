<?php

// if (isset($_SERVER["PATH_INFO"])) {
//   echo $_SERVER["PATH_INFO"];
// } else {
//   echo "Tidak ada path info"; 
// }

// $path = "/index";
// if (isset($_SERVER["PATH_INFO"])) {
//   $path =  $_SERVER["PATH_INFO"];
// } 
// require_once __DIR__ . "/../app/View" . $path . ".php";

// #3
require_once __DIR__ . "/../vendor/autoload.php";
use MyLibrary\Belajar\PHP\MVC\App\Router;
use MyLibrary\Belajar\PHP\MVC\Controller\HomeController;

Router::add("GET", "/", HomeController::class, "index", []);


Router::run();