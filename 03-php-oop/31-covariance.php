<?php

require_once "data/15-animal.php";
require_once "data/31-animal-shelter.php";
require_once "data/31-food.php";

// Covariance - dari parent menjadi child
// Contravariance - dari child dijadikan parent

$catshelter = new CatSHelter();
$cat = $catshelter->adopt("A");
$cat->eat(new AnimalFood()); // Contravariance

$dogshelter = new DogSHelter();
$dog = $dogshelter->adopt("B");
$dog->eat(new Food()); // Contravariance