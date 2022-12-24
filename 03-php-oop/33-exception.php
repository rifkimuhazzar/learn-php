<?php

require_once "exception/33-validation-exception.php";
require_once "data/33-login-request.php";
require_once "helper/33-validation.php";

$loginRequest = new LoginRequest();
$loginRequest->username = "";
$loginRequest->password = "";

// gunakan try catch untuk menangkap exception, maka jika terjadi error program tidak dihentikan
// catch bisa digunakan lebih dari 1
try {
  validateLoginRequest($loginRequest);
} catch (ValidationException | Exception $exception) {
  echo "Validation Error : {$exception->getMessage()}" . PHP_EOL;

  // Debug Exception
  var_dump($exception->getTrace()); // array
  echo $exception->getTraceAsString(); // string
} finally {
  // akan selalu dieksekusi
  echo "This is finally" . PHP_EOL;
}

echo "Validation" . PHP_EOL;
