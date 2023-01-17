<?php

namespace MyLibrary\Belajar\PHP\MVC\App {

function header(string $value) {
  echo $value;
}

}

namespace MyLibrary\Belajar\PHP\MVC\Service {

  require_once __DIR__ . "/../Helper/helper.php";

  function setcookie(string $name, string $value) {
    echo "$name: $value";
  }

}