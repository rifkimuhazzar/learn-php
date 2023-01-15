<?php

namespace MyLibrary\Belajar\PHP\MVC\App;

use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase {

  public function testRender() {
    View::render("Home/index", [
      "PHP Login Management"
    ]);

  self::expectOutputRegex("[PHP Login Management]");
  self::expectOutputRegex("[html]");
  self::expectOutputRegex("[body]");
  self::expectOutputRegex("[Login Management]");
  self::expectOutputRegex("[Login1]");
  self::expectOutputRegex("[Register]");
  }

  

}