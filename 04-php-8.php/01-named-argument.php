<?php

function sayHello(string $first, string $second = "", string $third): void {
  echo "Hello $first $second $third" . PHP_EOL;
}

// without named argument
sayHello("Rifki", "Muhazzar", "Web Developer"); 
// sayHello("Rifki", "Web Developer"); // error

// with named argument
sayHello(third: "Web Developer", first: "Rifki", second: "Muhazzar"); 
// sayHello(third: "Web Developer", first: "Rifki"); // error