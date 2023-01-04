<?php

require_once "vendor/autoload.php";

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger("Rifki Muhazzar");
$log->pushHandler(new StreamHandler("app.log", Logger::INFO));

$log->info("Hello World");
$log->info("Belajar Composer");
  