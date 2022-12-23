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
};