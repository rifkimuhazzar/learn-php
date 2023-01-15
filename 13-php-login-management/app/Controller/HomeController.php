<?php

namespace MyLibrary\Belajar\PHP\MVC\Controller;

use MyLibrary\Belajar\PHP\MVC\App\View;

class HomeController {

  function index(): void {
    $model = [
      "title" => "Belajar PHP MVC",
      "content" => "Selamat Belajar PHP MVC"
    ];
    
    // require __DIR__ . "/../view/Home/index.php";
    View::render("Home/index", $model);
  }

  function hello(): void {
    echo "HomeController.hello()";
  }

  function world(): void {
    echo "HomeController.world()";
  }

  function sayHello(): void {
    echo "Hello Rifki Muhazzar";
  }

  function login() {
    $request = [
      "username" => $_POST["username"],
      "passoword" => $_POST["password"]
    ];

    $user = [

    ];

    $response = [
      "message" => "Login berhasil"
    ];
  }
}