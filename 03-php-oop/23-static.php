<?php

require_once "helper/23-math-helper.php";

// $mathHelper = new MathHelper();
// echo $mathHelper->name . PHP_EOL;

echo MathHelper::$name . PHP_EOL;

MathHelper::$name = "Frontend";
echo MathHelper::$name . PHP_EOL;

$result = MathHelper::sum(10, 10, 10);
echo "Result = $result" . PHP_EOL;