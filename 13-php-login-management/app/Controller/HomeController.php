<?php

namespace MyLibrary\Belajar\PHP\MVC\Controller;

use MyLibrary\Belajar\PHP\MVC\App\View;

class HomeController {

  function index() {
    View::render("Home/index", [
      "title" => "PHP Login Management"
    ]);
  }
}