<?php

namespace MyLibrary\Belajar\PHP\MVC;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class LoggerTest extends TestCase {

  public function testLogger() {
    $logger = new Logger("MyLog");

    self::assertNotNull($logger); 
  }

  public function testLoggerWithName() {
    $logger = new Logger(LoggerTest::class);

    self::assertNotNull($logger); 
  }

}