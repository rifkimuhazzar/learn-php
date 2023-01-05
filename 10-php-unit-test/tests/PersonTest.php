<?php

namespace MyClass\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase {

  private Person $person;

  //  ini function bawaan dari TestCase, ini di eksekusi sebelum unit testnya | Fixture
  protected function setUp(): void {
    // $this->person = new Person("Rifki");
  }

  // sama seperti setUp atau | Fixture
  /**
   * @before
   */
  public function createPerson() {
    $this->person = new Person("Rifki");
  }

  public function testSuccess() {
    // $person = new Person("Rifki");
    Assert::assertEquals("Hello Muhazzar, my name is Rifki", $this->person->sayHello("Muhazzar"));
  }

  public function testException() {
    // $person = new Person("Rifki");
    $this->expectException(\Exception::class);
    $this->person->sayHello(null);
  }

  public function testGoodByeSuccess() {
    // $person = new Person("Rifki");
    $this->person->sayGoodBye("Rifki 2");
    $this->expectOutputString("Good Bye Rifki 2" . PHP_EOL);
  }

}