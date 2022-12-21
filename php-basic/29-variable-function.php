<?php

function foo(){
  echo "Foo" . PHP_EOL;
}
function bar(){
  echo "Bar" . PHP_EOL;
}

$myFunction = "foo";
$myFunction();
$myFunction = "bar";
$myFunction();

function sayHello(string $name, $filter) {
  $result = $filter($name);
  echo "Hello $result" . PHP_EOL; 
}
function sampleFuntion(string $name) {
  return "Sample $name";
}

sayHello("Rifki", "sampleFuntion");
sayHello("Rifki", "strtolower");
sayHello("Rifki", "strtoupper");
