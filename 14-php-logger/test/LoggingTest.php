<?php

namespace MyLibrary\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class LoggingTest extends TestCase {

  public function testLogging() {
    $logger = new Logger(HandlerTest::class);

    $logger->pushHandler(new StreamHandler("php://stderr")); // stderr | stdout
    $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
    
    $logger->info("First");
    $logger->info("Second");
    $logger->info("Third");

    self::assertNotNull($logger);
  }

}