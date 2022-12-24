<?php

// secara default saat memanggil property/function yang tidak ada, maka tidak langsung error
// akan di panggil magic function dahulu jika ada, jika tidak baru error
class Zero {
  // Dynamic properties
  private array $properties = [];
  function __get($name) {
    return $this->properties[$name];
  }
  public function __set($name, $value) {
    $this->properties[$name] = $value;
  }
  public function __isset($name): bool {
    return isset($this->properties[$name]);
  }
  public function __unset($name) {
    unset($this->properties[$name]);
  }

  // Dynamic function
  // parameter ke 2 jika lebih dari 1 akan secara otomatis dikonversi ke array
  public function __call($name, $arguments) {
    $join = implode(",", $arguments);
    echo "Call function $name with arguments $join" . PHP_EOL;
  }
  public static function __callStatic($name, $arguments) {
    $join = implode(",", $arguments);
    echo "Call static function $name with arguments $join" . PHP_EOL;
  }
}

$zero = new Zero();
$zero->firstName = "Rifki";
$zero->lastName = "Muhazzar";
$zero->role = "Web Developer";

echo "First Name : $zero->firstName" . PHP_EOL;
echo "Last Name : $zero->lastName" . PHP_EOL;
echo "Role : $zero->role" . PHP_EOL;

$zero->sayHello("Rifki, Muhazzar, Frontend");
Zero::sayHello("Rifki, Muhazzar, Frontend");