<?php
// $a++ | ++$a | $a-- | --$a

$a = 10;
$a++;
++$a;

$b = ++$a;
$b = ++$a;


var_dump($b);