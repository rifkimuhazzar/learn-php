<?php

class Example {
  public string|int|bool|array $value;
}

$example = new Example();
$example->value = "Rifki"; 
$example->value = 100; 
$example->value = true; 
$example->value = []; 


function sampleF(string|array $value): string|array {
  if (is_string($value)) {
    return "This is string";
  } else if (is_array($value)) {
    return ["This is array", 1, 2];
  }
}

var_dump(sampleF("Rifki"));
var_dump(sampleF([]));