<?php

namespace MyLibrary\Belajar\PHP\MVC;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class RotatingFileTest extends TestCase {

  public function testRotating() {
    $logger = new Logger(RotatingFileTest::class);
    $logger->pushHandler(new StreamHandler("php://stderr"));
    $logger->pushHandler(new RotatingFileHandler(__DIR__ . "/../app.log", 10, Logger::INFO));

    $logger->info("First");
    $logger->info("Second");
    $logger->info("Third");

    self::assertNotNull($logger);
  }


}