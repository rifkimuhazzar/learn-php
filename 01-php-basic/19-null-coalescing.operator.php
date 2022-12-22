<?php

$data = [
  "name" => "Rifki",
  "role" => "Web Developer",
  "adress" => null,
];
$result = $data["address"] ?? "Nothing";

echo $result;