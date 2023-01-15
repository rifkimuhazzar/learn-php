<?php

namespace MyLibrary\Belajar\PHP\MVC;

use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase {

  public function testRegex() {
    $path = "/products/12345/categories/abcde";
    $pattern = "#^/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)$#";
    $result = preg_match($pattern, $path, $vari);

    self::assertEquals(1, $result);

    var_dump($vari);

    array_shift($vari);
    var_dump($vari);
  }

}