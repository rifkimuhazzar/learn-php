<?php

function validate(string $value) {
  if (trim($value) == "") {
    throw new Exception("Invalid String");
  }
}

try {
  validate("   ");
} catch (Exception) {
  // di php 8 catch nya tidak perlu menambahkan variable lagi jika tidak digunakan
  echo "Invalid" . PHP_EOL;
}