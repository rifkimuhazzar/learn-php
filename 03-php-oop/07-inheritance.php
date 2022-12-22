<?php

require_once "data/manager.php";

$manager = new Manager();
$manager->name = "Rifki 1";
$manager->sayHello("Rifki 2");

$vp = new VicePresident();
$vp->name = "Rifki 3";
$vp->sayHello("Rifki 4");