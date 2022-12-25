<?php

class ParentClass {
  public function method(string $name): void {

  }
}
class ChildClass extends ParentClass {
  public function method(string $name): void {

  }
}

class Manager {
  private function method(string $name): void {

  }
}
class VicePresident extends Manager {
  public function method(int $name): string {
    return "Hello World";
  }
}