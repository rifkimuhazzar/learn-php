<?php

namespace MyClass\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\TestCase; // wajib titambahkan agar bisa mengimplementasikan unit test

// nama class biasanya ditambah Test di akhir dan extends testCase
// class TestCase turunan dari Class Assert
class CounterTest extends TestCase {

  private Counter $counter;

  protected function setUp(): void {
    $this->counter = new Counter();
    echo "Membuat Counter" . PHP_EOL;
  }

  public function testIncrement() {
    self::assertEquals(0, $this->counter->getCounter());

    // function ini berisi throw new incompleteTestError()
    // maka kode di bawahnya tidak akan di eksekusi
    self::markTestIncomplete("Incomplete Test"); 

    echo "TEST";
  }

  // nama function wajib ditambah test di awal jika tidak menggunakan anotation @test
  public function testCounter() {

    $this->counter->increment();
    Assert::assertEquals(1, $this->counter->getCounter());

    $this->counter->increment();
    $this->assertEquals(2, $this->counter->getCounter());

    $this->counter->increment();
    self::assertEquals(3, $this->counter->getCounter());
  }

  // public function testOther() {
  //   echo "Other" . PHP_EOL;
  // }

  // anotation @test untuk membuat function test tanpa kata test diawalnya
  /**
   * @test
   */
  public function increment() {
    // ini menghasilkan error SkippedTestError
    self::markTestSkipped("Masih ada error yang bingung");

    $this->counter->increment();
    Assert::assertEquals(1, $this->counter->getCounter());
  }

  public function testFirst(): Counter {
    // $this->counter->increment();
    // $this->counter->increment();
    $this->counter->increment();
    Assert::assertEquals(1, $this->counter->getCounter());

    return $this->counter;
  }

  // unit test yang baik harus independen
  /**
   * @depends testFirst
   */
  public function testSecond(Counter $counter): void {
    $counter->increment();
    $this->assertEquals(2, $counter->getCounter());
  }

  // dijalankan setiap selesai 1 unit test | Fixture
  protected function tearDown(): void {
    echo "Tear Down" . PHP_EOL;
  }

  /**
   * @after
   */
  public function after(): void {
    echo "After" . PHP_EOL;
  }

  // skip dengan kondisi
  /**
   * @requires OSFAMILY Windows
   * @requires PHP >= 8
   */
  public function testOnlyWindowsAndPHP8() {
    self::assertTrue(true, "Only for Windows and PHP 8");
  }

}