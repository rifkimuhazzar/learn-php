<?php

function sayHello(string $name, callable $filter) {
  $result = call_user_func($filter, $name); // sama dengan $filter();
  echo "Hello $result" . PHP_EOL;
}

sayHello("Rifki", "strtoupper");
sayHello("Rifki", "strtolower");
sayHello("Rifki", function (string $name): string {
  return strtoupper($name);
});
sayHello("Rifki", fn (string $name): string => strtolower($name));
// sayHello("Muhazzar");