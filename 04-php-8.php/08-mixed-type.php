<?php

function test(mixed $data): mixed {
  if (is_array($data)) {
    return [];
  } else if (is_string($data)) {
    return "String";
  } else if (is_int($data)) {
    return 1;
  } else {
    return null;
  }

  echo "Hello World";
}

var_dump(test([]));
var_dump(test("Hello"));
var_dump(test(1));
var_dump(test(new stdClass()));