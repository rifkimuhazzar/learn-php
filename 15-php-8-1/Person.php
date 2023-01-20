<?php

class Person {

  public function __construct(public string $name) {}

  function sayHello(string $name):string {
    return "Hello $name, my name is $this->name"; 
  }

}

$person = new Person("Rifki");
$reference = $person->sayHello(...);
echo $reference("Rifki 2") . PHP_EOL;
var_dump($reference("Rifki 2"));

// $reference2 = str_contains(...);