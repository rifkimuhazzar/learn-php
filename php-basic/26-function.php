<?php

function sayHello() {
  echo "Hello function"  . PHP_EOL;
}
sayHello();
sayHello();
sayHello();

$create = true;
if ($create) {
  function sayHi() {
    echo "Hi function"  . PHP_EOL;
  }
}
sayHi();
sayHi();
sayHi();