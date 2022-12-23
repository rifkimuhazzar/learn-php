<?php

require_once "data/16-category.php";

$category = new Category();
$category->setName("Rifki");
$category->setExpensive(true);

$category->setName("");

// harus menggunakan {} jika memanggil function/method
echo "Name : {$category->getName()}" . PHP_EOL;
echo "Expensive : {$category->isExpensive()}" . PHP_EOL;
