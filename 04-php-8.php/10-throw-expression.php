<?php

function sayHello(?string $name) {
  if ($name == null) {
    throw new Exception("Tidak boleh null");
  }
  echo "Hello $name" . PHP_EOL;
}

function sayHello2(?string $name) {
  $result = $name != null ? "Hello $name" : throw new Exception("Tidak boleh null");
  echo $result . PHP_EOL;
}

sayHello("Rifki");
// sayHello(null);

sayHello2("Rifki");
// sayHello2(null);