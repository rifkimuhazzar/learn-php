<?php

require_once "data/10-product.php";

$product = new Product("Apple", 5000);
echo $product->getName();
echo $product->getPrice();

$dummy = new ProductDummy("Dummy", 1000);
echo $dummy->info();