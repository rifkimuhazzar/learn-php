<?php

require_once "exception/33-validation-exception.php";
require_once "data/33-login-request.php";
require_once "helper/35-validation-util.php";

$request = new LoginRequest();
$request->username = "Rifki";
$request->password = "rifki123";

// ValidationUtil::validate($request);

// bisa validasi object apapun
ValidationUtil::validateReflection($request); // reflection

class RegiterUserRequest {
  public ?string $name;
  public ?string $address;
  public ?string $email;
}
$register = new RegiterUserRequest();
$register->name = "Rifki";
$register->address = "Rifki 2";
$register->email = "Rifki 3";
ValidationUtil::validateReflection($register);