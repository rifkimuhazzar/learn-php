<?php

namespace MyClass\Test;

use PHPUnit\Framework\TestCase;

class CounterStaticTest extends TestCase {

  public static Counter $counter; // variablenya menjadi static

  // static function ini akan di jalankan sekali sebelum unit test
  // bisa juga menggunakan anotation @beforeClass
  public static function setUpBeforeClass(): void {
    self::$counter = new Counter();
  }

  public function testFirst() {
    self::$counter->increment();
    self::assertEquals(1, self::$counter->getCounter());
  }

  public function testSecond() {
    self::$counter->increment();
    self::assertEquals(2, self::$counter->getCounter());
  }

  // static function ini akan di jalankan sekali setelah semua unit test
  // bisa juga menggunakan anotation @afterClass
  public static function tearDownAfterClass(): void {
    echo "Unit Test Selesai" . PHP_EOL;
  }

}