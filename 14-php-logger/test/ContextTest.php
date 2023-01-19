<?php

namespace MyLibrary\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase {

  public function testContext() {
    $logger = new Logger(ContextTest::class);

    $logger->pushHandler(new StreamHandler("php://stderr"));

    $logger->info("This is log message", ["username" => "Rifki", "1" => "2"]);
    $logger->info("Try login user", ["username" => "Rifki"]);
    $logger->info("Success login user", ["username" => "Rifki"]);
    $logger->info("Tidak ada context");

    self::assertNotNull($logger);
  }

}