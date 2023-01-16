<?php
require_once __DIR__ . "/../vendor/autoload.php";

use MyLibrary\Belajar\PHP\MVC\App\Router;
use MyLibrary\Belajar\PHP\MVC\Controller\HomeController;
use MyLibrary\Belajar\PHP\MVC\Controller\UserController;
use MyLibrary\Belajar\PHP\MVC\Config\Database;

Database::getConnection("prod");

Router::add("GET", "/", HomeController::class, "index", []); // HomeController
Router::add("GET", "/users/register", UserController::class, "register", []); // UserController
Router::add("POST", "/users/register", UserController::class, "postRegister", []); // UserController
Router::add("GET", "/users/login", UserController::class, "login", []); // UserController
Router::add("POST", "/users/login", UserController::class, "postLogin", []); // UserController

Router::run();