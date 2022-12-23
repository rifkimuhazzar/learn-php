<?php

// menggunakan interface IteratorAggregate bawaan php
class Data implements IteratorAggregate { 
  var string $first = "First";
  public string $second = "Second";
  private string $third = "Third";
  protected string $forth = "Forth";

  // iterasi object secara manual
  // function bawaan php dari interface IteratorAggregate
  // membuat iterator secara manual
  
  // public function getIterator() {
  //   $array = [
  //     "first" => $this->first,
  //     "second" => $this->second,
  //     "third" => $this->third,
  //     "forth" => $this->forth,
  //   ];
  //   return new ArrayIterator($array); // class bawaan php
  // }

  // membuat iterator secara otomatis
  public function getIterator() {
    // yield adalah object generator untuk generate iterator secara otomatis
    yield "first" => $this->first; 
    yield "second" => $this->second;
    yield "third" => $this->third;
    yield "forth" => $this->forth;
  }
}

$data = new Data();
foreach ($data as $property => $value) {
  echo "$property : $value" . PHP_EOL;
}