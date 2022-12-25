<?php

trait SampleTrait {
  public abstract function sampleF(string $name): string;
}

class sampleClass {
  use SampleTrait;

  public function sampleF(string $name): string {
    return "Hello World";
  }
}