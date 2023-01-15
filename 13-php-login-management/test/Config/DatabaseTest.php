<?php

namespace MyLibrary\Belajar\PHP\MVC\Config;

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase {

  public function testGetConnection() {
    $connection = Database::GetConnection();
    self::assertNotNull($connection);
  }

  public function testGetConnectionSingleTone() {
    $connection1 = Database::GetConnection();
    $connection2 = Database::GetConnection();
    self::assertSame($connection1, $connection2);
  }

}