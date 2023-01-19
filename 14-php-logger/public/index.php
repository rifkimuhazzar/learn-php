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
use MyLibrary\Belajar\PHP\MVC\Controller\ProductController;
use MyLibrary\Belajar\PHP\MVC\Middleware\AuthMiddleware;

Router::add("GET", "/", HomeController::class, "index");
Router::add("GET", "/hello", HomeController::class, "hello", [AuthMiddleware::class]);
Router::add("GET", "/world", HomeController::class, "world", [AuthMiddleware::class]);
Router::add("GET", "/sayHello", HomeController::class, "sayHello");

Router::add("GET", "/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)", ProductController::class, "categories");


Router::run();