<?php

namespace MyLibrary\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

// debug100 | info200 | notice250 | warning300 | error400 | critical500 | alert550 | emergency600 
class LevelTest extends TestCase {

  public function testLevel() {
    $logger = new Logger(LevelTest::class);
    
    $logger->pushHandler(new StreamHandler("php://stderr", Logger::WARNING)); // param2 atau levelnya jika tidak diisi maka defaultnya debug
    $logger->pushHandler(new StreamHandler(__DIR__ . "/../application.log"));
    $logger->pushHandler(new StreamHandler(__DIR__ . "/../error.log", 400));

    $logger->debug("This is debug");
    $logger->info("This is info");
    $logger->notice("This is notice");
    $logger->warning("This is warning");
    $logger->error("This is error");
    $logger->critical("This is critical");
    $logger->alert("This is alert");
    $logger->emergency("This is emergency");

    self::assertNotNull($logger);
  }

}