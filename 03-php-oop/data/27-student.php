<?php

class Student {
  public string $id;
  public string $name;
  public int $value;
  private string $sample;

  public function setSample(string $sample): void {
    $this->sample = $sample;
  }

  // untuk memodifikasi clone object, seperti memilig props mana yang tidak ingin diclone
  public function __clone() {
    unset($this->sample);
    unset($this->name);
  }

  // magic function biasanya diawali dengan __ seperti __clone()
  // ini adalah funtion yang sudah ditentukan fungsinya oleh php
  function __toString(): string {
    return "student id:$this->id, name:$this->name, value:$this->value";
  }

  // agar variable/objectnya bisa dianggap sebagai function
  public function __invoke(...$arguments): void {
    $join = join(",", $arguments);
    echo "Invoke student with arguments $join" . PHP_EOL;
  }

  // mengoverride variable/object ketika var_dump() menjadi seperti di bawah ini
  public function __debugInfo(): array {
    return [
      "id" => $this->name,
      "name" => $this->name,
      "value" => $this->value,
      "sample" => $this->sample,
      "author" => "Rifki",
      "version" => "1.0.0"
    ];
  }

};