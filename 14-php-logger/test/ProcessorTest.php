<?php

namespace MyLibrary\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase {

  public function testProcessorRecord() {
    $logger = new Logger(ProcessorTest::class);
    $logger->pushHandler(new StreamHandler("php://stderr"));

    $logger->pushProcessor(new GitProcessor());
    $logger->pushProcessor(new MemoryUsageProcessor());
    $logger->pushProcessor(new HostnameProcessor());
    $logger->pushProcessor(function ($record) {
      // var_dump($record);
      $record["extra"]["contoh"] = [
        "app" => "Belajar PHP Logging",
        "author" => "Rifki"
      ];
      return $record;
    });

    $logger->info("Hello World", ["username" => "Rifki"]);
    $logger->info("Hello World 2");
    $logger->info("Hello World 3");

    self::assertNotNull($logger);
  }

}